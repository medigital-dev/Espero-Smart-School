<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class DefaultUser extends Seeder
{
    public function run()
    {
        $users = new UserModel();

        $user = new User([
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password' => 'Admin12345',
        ]);

        $users->save($user);
    }
}
