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

    public function test_create_category_name() {
        $tmForumManager = app()->make(TMForumAPIManager::class);
        $name = "New Category";
        $description = "Category description";
        $response = $tmForumManager->createProductCategory($name, $description);
        self::assertTrue($name === $response->name && $response->id !== null);
    }
}
