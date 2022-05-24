<?php

namespace App\BusinessLogicLayer\TMForumAPI;

use App\Repository\NetappRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TMForumAPIManager implements ForumAPIManager {


    protected $client;
    private static $TM_FORUM_API_BASE_URL;
    private static $API_VERSION = "1.0";
    protected $netAppRepository;

    public function __construct(NetappRepository $netAppRepository) {
        self::$TM_FORUM_API_BASE_URL = config('app.tm_forum_api_base_url');
        $this->client = new Client(['base_uri' => self::$TM_FORUM_API_BASE_URL]);
        $this->netAppRepository = $netAppRepository;
    }

    public function getProductCategoryByName(string $name) {
        $data = collect(json_decode($this->client->request('GET', 'productCatalogManagement/v4/category', [
            'query' => [
                'name' => $name
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody()));
        if ($data->count() > 0)
            return $data->first();
        return null;
    }

    public function createProductCategory(string $name, string $description) {
        $existing = $this->getProductCategoryByName($name);
        if ($existing)
            return $existing;
        return json_decode($this->client->request('POST', 'productCatalogManagement/v4/category', [
            'json' => [
                'name' => $name,
                'description' => $description,
                "version" => self::$API_VERSION
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());
    }

    public static function isForumAPIEnabled(): bool {
        return self::$TM_FORUM_API_BASE_URL !== null
            && strpos(self::$TM_FORUM_API_BASE_URL, "http") !== FALSE;
    }

    protected function getCommonHeaders(): array {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    public function getProductById(string $id) {
        $product = json_decode($this->client->request('GET', 'productCatalogManagement/v4/productOffering/' . $id, [
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());

        if($product && $this->productHasOfferingPrice($product)) {
           $product->productOfferingPrice[0]->object = json_decode($this->client->request('GET', 'productCatalogManagement/v4/productOfferingPrice/' . $product->productOfferingPrice[0]->id, [
                // If you want more information during request
                'debug' => false,
                'headers' => $this->getCommonHeaders()
            ])->getBody());
        }

        return $product;
    }

    private function productHasOfferingPrice($product): bool {
        return ($product->productOfferingPrice && is_array($product->productOfferingPrice) && $product->productOfferingPrice[0]->id);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function createProduct(array $data) {
        $this->validateProductCall($data);
        $productOfferingPrice = $this->createProductOfferingPrice($data['name'], $data['price']);
        $response = $this->performProductCall($data, $productOfferingPrice, 'POST');
        $netapp = $this->netAppRepository->find($data['netapp_id']);
        $netapp->tm_forum_id = $response->id;
        $netapp->save();
        return $response;
    }

    /**
     * @param string $api_product_id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function updateProduct(string $api_product_id, array $data) {
        $this->validateProductCall($data);

        $product = $this->getProductById($api_product_id);
        if (!$this->productHasOfferingPrice($product)) {
            $productOfferingPrice = $this->createProductOfferingPrice($data['name'], $data['price']);
        } else {
            $productOfferingPriceId = $product->productOfferingPrice[0]->id;
            $productOfferingPrice = $this->updateProductOfferingPrice($productOfferingPriceId, $data['name'], $data['price']);
        }

        $data['id'] = $api_product_id;
        $response = $this->performProductCall($data, $productOfferingPrice, 'PATCH');
        $this->netAppRepository->updateOrCreate(['id' => $data['netapp_id']], ['tm_forum_id' => $response->id]);
        return $response;
    }

    /**
     * @throws Exception
     */
    protected function validateProductCall(array $data) {
        if (!$data['name'])
            throw new Exception("Product name is required");
        if (!$data['description'])
            throw new Exception("Product description is required");
        if (!$data['price'])
            throw new Exception("Product price is required");
        if (!is_numeric($data['price']))
            throw new Exception("Product price must be a number");
    }

    /**
     * @throws GuzzleException
     */
    protected function performProductCall(array $data, $productOfferingPrice, string $requestVerb) {
        $url = 'productCatalogManagement/v4/productOffering';
        if ($requestVerb === 'PATCH')
            $url .= '/' . $data['id'];
        return json_decode($this->client->request($requestVerb, $url, [
            'json' => [
                'name' => $data['name'],
                'description' => $data['description'],
                "version" => self::$API_VERSION,
                "isBundle" => false,
                "isSellable" => true,
                "statusReason" => "Product Released for sale",
                "productOfferingPrice" => [
                    [
                        "id" => $productOfferingPrice->id,
                        "href" => $productOfferingPrice->href,
                        "name" => $productOfferingPrice->name
                    ]
                ],
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());
    }

    protected function createProductOfferingPrice(string $productName, float $price) {
        return $this->performProductOfferingPriceCall([], $productName, $price);
    }

    protected function updateProductOfferingPrice(string $productOfferingPriceId, string $productName, float $price) {
        return $this->performProductOfferingPriceCall(['id' => $productOfferingPriceId], $productName, $price);
    }

    protected function performProductOfferingPriceCall(array $data, string $productName, float $price) {
        $url = 'productCatalogManagement/v4/productOfferingPrice';
        $requestVerb = 'POST';
        if (isset($data['id']) && $data['id']) {
            $url .= '/' . $data['id'];
            $requestVerb = 'PATCH';
        }
        return json_decode($this->client->request($requestVerb, $url, [
            'json' => [
                'name' => "Fixed price for: " . $productName,
                'description' => "This pricing describes the fixed (one-time) charge for the product",
                "version" => self::$API_VERSION,
                "priceType" => "fixed",
                "isBundle" => false,
                "price" => [
                    "unit" => "EUR",
                    "value" => $price
                ],
                "percentage" => 0,
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());
    }
}
