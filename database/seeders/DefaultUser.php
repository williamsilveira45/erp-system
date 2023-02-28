<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UserFactory $userFactory)
    {
        $dataUser = $userFactory->definition();

        $defaultUser = new User();
        $defaultUser->name = "Default User";
        $defaultUser->email = env('DEFAULT_USER_EMAIL', $dataUser['email']);
        $defaultUser->email_verified_at = $dataUser['email_verified_at'];
        $defaultUser->remember_token = $dataUser['remember_token'];
        $defaultUser->setPassword(env('DEFAULT_USER_PASSWORD', 'password'));

        $defaultUser->save();
    }
}
