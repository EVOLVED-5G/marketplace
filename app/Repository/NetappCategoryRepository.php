<?php

namespace App\Repository;

use App\Models\Category;

class NetappCategoryRepository extends Repository {

    /**
     * @inheritDoc
     */
    function getModelClassName() {
        return Category::class;
    }
}
