<?php

namespace App\Services;

use App\Models\User as UserModel;

class User
{
    public static function register(string $email, string $username, string $password): bool
    {
        $user = UserModel::create(

        );
    }
}
