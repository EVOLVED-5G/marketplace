<?php

namespace Database\Seeders;

use App\BusinessLogicLayer\Image\ImageManager;
use App\Repository\NetappCategoryRepository;
use App\Repository\NetappRepository;
use Illuminate\Database\Seeder;

class TestNetappSeeder extends Seeder {

    protected $netappRepository;
    protected $netappCategoryRepository;
    protected $imageManager;

    public function __construct(NetappRepository $netappRepository, NetappCategoryRepository $netappCategoryRepository,
                                ImageManager     $imageManager) {

        $this->netappRepository = $netappRepository;
        $this->netappCategoryRepository = $netappCategoryRepository;
        $this->imageManager = $imageManager;
    }


    public function run() {
        echo "\nRunning Netapp Seeder...\n";

        $data = [
            'id' => 1,
            'name' => 'Test Net app #1',
            'about' => 'This is a test net app',
            'category_id' => $this->netappCategoryRepository->find(1)->id,
            'published_by' => 'user',
            'version' => '1.0',
            'url_site' => 'https://scify.org',
            'github_url' => 'https://scify.org',
            'docker_image_url' => 'https://scify.org',
            'type_id' => 1,
            'user_id' => 1,
            'tutorial_docs' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'slug' => 'test_net_app_1',
            'visible' => true,
            'fix_price' => 100
        ];

        $netapp = $this->netappRepository->updateOrCreate(['id' => $data['id']], $data);
        echo "\nAdded Netapp: " . $netapp->name . "\n";

        $logo = $this->imageManager->create([
            'url' => 'images/login-bck.png',
            'imageable_type' => 'App\Models\Netapp',
            'imageable_id' => $netapp->id,
            'type' => 'logo'
        ]);
    }
}
