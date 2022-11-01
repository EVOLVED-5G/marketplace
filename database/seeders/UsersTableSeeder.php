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
                'name' => 'Alexandros Tzoumas',
                'email' => 'alexandros.tzoumas@gmail.com',
                'password' => bcrypt(config('app.admin_pass_seed'))
            ]
        ];

        foreach ($data as $user) {
            $user = $this->userRepository->updateOrCreate(['id' => $user['id']],
                $user);
            echo "\nAdded User: " . $user->name . " with email: " . $user->email . " and pass: " . config('app.admin_pass_seed') . "\n";
        }
    }
}
