<?php

namespace Database\Seeders;

use App\Models\NetappType;
use Illuminate\Database\Seeder;

class NetappTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NetappType::create(['name' => 'Standalone']);
        NetappType::create(['name' => 'Non Standalone']);
    }
}
