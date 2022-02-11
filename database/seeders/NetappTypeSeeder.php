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
        NetappType::create(['name' => 'NetappType 1']);
        NetappType::create(['name' => 'NetappType 2']);
        NetappType::create(['name' => 'NetappType 3']);
        NetappType::create(['name' => 'NetappType 4']);
        NetappType::create(['name' => 'NetappType 5']);
        NetappType::create(['name' => 'NetappType 6']);
    }
}
