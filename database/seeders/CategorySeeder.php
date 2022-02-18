<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Artificial intelligence']);
        Category::create(['name' => 'Cyber security & cryptography']);
        Category::create(['name' => 'Identity and verification']);
        Category::create(['name' => 'Messaging services']);
        Category::create(['name' => 'Mobile carrier lending and advances']);
        Category::create(['name' => 'Mobile carrier subscriptionsa']);
    }
}
