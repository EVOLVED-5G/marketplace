<?php

namespace App\BusinessLogicLayer\TMForumAPI;

interface ForumAPIManager {

    public function getProductCategoryByName(string $name);

    public function createProductCategory(string $name, string $description);

    public function isForumAPIEnabled(): bool;

    public function getProductById(string $id);

    public function createProduct(array $data);
}
