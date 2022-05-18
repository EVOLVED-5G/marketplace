<?php

namespace App\BusinessLogicLayer\TMForumAPI;

use GuzzleHttp\Client;

class TMForumAPIManager implements ForumAPIManager {

    private $TM_FORUM_API_BASE_URL;
    protected $client;

    public function __construct() {
        $this->TM_FORUM_API_BASE_URL = config('app.tm_forum_api_base_url');
        $this->client = new Client(['base_uri' => $this->TM_FORUM_API_BASE_URL]);
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
                'description' => $description
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());
    }

    public function isForumAPIEnabled(): bool {
        return $this->TM_FORUM_API_BASE_URL !== null
            && strpos($this->TM_FORUM_API_BASE_URL, "http") !== FALSE;
    }

    protected function getCommonHeaders(): array {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    public function getProductById(string $id) {
        $data = collect(json_decode($this->client->request('GET', 'productCatalogManagement/v4/productOffering/' . $id, [
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody()));
        if ($data->count() > 0)
            return $data->first();
        return null;
    }

    public function createProduct(array $data) {
        $productOfferingPrice = $this->createProductOfferingPrice($data['price']);
        return json_decode($this->client->request('POST', 'productCatalogManagement/v4/category', [
            'json' => [
                'name' => $data['name'],
                'description' => $data['description'],
                "version" => "1.0",
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

    protected function createProductOfferingPrice(float $price) {
        return json_decode($this->client->request('POST', 'productCatalogManagement/v4/productOfferingPrice', [
            'json' => [
                'name' => "Fixed price for product",
                'description' => "This pricing describes the fixed (one-time) charge for a product",
                "version" => "1.0",
                "priceType" => "fixed",
                "isBundle" => false,
                "price" => [
                    "unit" => "EUR",
                    "amount" => $price
                ],
            ],
            // If you want more information during request
            'debug' => false,
            'headers' => $this->getCommonHeaders()
        ])->getBody());
    }
}
