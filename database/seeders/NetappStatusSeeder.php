<?php

namespace Database\Seeders;

use App\Models\NetappStatus;
use Illuminate\Database\Seeder;

class NetappStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NetappStatus::create(['name' => 'Publicly Available']);
        NetappStatus::create(['name' => 'Deleted']);
        NetappStatus::create(['name' => 'Not Available']);
    }
}
