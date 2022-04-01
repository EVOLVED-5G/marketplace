<?php

namespace Database\Seeders;

use App\Repository\User\UserRepository;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {

        $this->userRepository = $userRepository;
    }


    public function run() {
        echo "\nRunning User Seeder...\n";

        $data = [
            [
                'id' => 1,
                'name' => 'Platform Admin',
                'email' => 'admin@evolved5g.orgZ',
                'password' => bcrypt(env('DEFAULT_ADMIN_USER_PASSWORD_FOR_SEED'))
            ]
        ];

        foreach ($data as $user) {
            $user = $this->userRepository->updateOrCreate(['id' => $user['id']],
                $user);
            echo "\nAdded User: " . $user->name . " with email: " . $user->email . "\n";
        }
    }
}
