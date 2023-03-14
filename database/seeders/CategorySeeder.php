<?php

namespace Database\Seeders;

use App\BusinessLogicLayer\TMForumAPI\ForumAPIManager;
use App\BusinessLogicLayer\TMForumAPI\TMForumAPIManager;
use App\Repository\NetappCategoryRepository;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

    protected NetappCategoryRepository $repository;
    protected ForumAPIManager $forumAPIManager;

    public function __construct(NetappCategoryRepository $repository, ForumAPIManager $forumAPIManager) {
        $this->repository = $repository;
        $this->forumAPIManager = $forumAPIManager;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        echo "\nRunning Netapp Categories Seeder...\n";

        $data = [
            [
                'id' => 1,
                'name' => 'Artificial intelligence',
                'description' => 'Artificial Intelligence related Netapps'
            ],
            [
                'id' => 2,
                'name' => 'Cyber security & cryptography',
                'description' => 'Cyber security & cryptography related Netapps'
            ],
            [
                'id' => 3,
                'name' => 'Identity and verification',
                'description' => 'Identity and verification related Netapps'
            ],
            [
                'id' => 4,
                'name' => 'Messaging services',
                'description' => 'Messaging services related Netapps'
            ],
            [
                'id' => 5,
                'name' => 'Mobile carrier lending and advances',
                'description' => 'Mobile carrier lending and advances related Netapps'
            ],
            [
                'id' => 6,
                'name' => 'Mobile carrier subscriptions',
                'description' => 'Mobile carrier subscriptions related Netapps'
            ],
            [
                'id' => 7,
                'name' => 'Robotics',
                'description' => 'Robotics'
            ],
            [
                'id' => 8,
                'name' => 'Other',
                'description' => 'Netapps that dont fall into any other category'
            ]
        ];

        foreach ($data as $category) {
            if (TMForumAPIManager::isForumAPIEnabled()) {
                try {
                    $apiCategory = $this->forumAPIManager->createProductCategory($category['name'], $category['description']);
                    $category['tm_forum_id'] = $apiCategory->id;
                    echo "\nCreated Category in TMForum API: " . $category['name'] . " with id: " . $apiCategory->id . "\n";
                } catch (ConnectException $e) {
                    echo "\nException when trying to use the TM Forum API: " . $e->getMessage() . "\n";
                }
            }
            $this->repository->updateOrCreate(['id' => $category['id']], $category);
            echo "\nAdded Category: " . $category['name'] . "\n";
        }

    }
}
