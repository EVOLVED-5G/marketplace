<?php

namespace Tests\Unit;

use App\BusinessLogicLayer\BlockchainTransaction\EthereumAPIBlockchainTransactionManager;
use App\BusinessLogicLayer\TMForumAPI\TMForumAPIManager;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tests\CreatesApplication;
use Tests\TestCase;

class TMForumTests extends TestCase {
    use CreatesApplication;

    public function setUp(): void {
        parent::setUp();
    }

    public function test_create_category() {
        $tmForumManager = app()->make(TMForumAPIManager::class);
        $name = "New Category";
        $description = "Category description";
        $response = $tmForumManager->createProductCategory($name, $description);
        self::assertTrue($name === $response->name && $response->id !== null);
    }

    /**
     * A basic test example.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function test_get_category_by_name() {
        $tmForumManager = app()->make(TMForumAPIManager::class);
        $name = "Cloud Services";
        $response = $tmForumManager->getProductCategoryByName($name);
        self::assertEquals($name, $response->name);
    }

    public function test_create_product() {
        $tmForumManager = app()->make(TMForumAPIManager::class);
        $name = "New Product";
        $description = "Product description";
        $price = 100.0;
        $response = $tmForumManager->createProduct([
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);
        self::assertTrue($name === $response->name && $response->id !== null);
    }

    public function test_get_product_by_id() {
        $tmForumManager = app()->make(TMForumAPIManager::class);
        $id = "fd77a027-9c5e-4014-af34-fec377301eb7";
        $response = $tmForumManager->getProductById($id);
        self::assertTrue( $response->id === $id && $response->productOfferingPrice->value !== null);
    }
}
