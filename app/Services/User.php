<?php

namespace App\Services;

use App\Models\User as UserModel;

class User
{
    public static function register(string $email, string $username, string $password): bool
    {
        return UserModel::create(
            $email,
            $username,
            bcrypt($password)
        );
    }

    public static function login(string $email, string $password): bool
    {
        return false;
    }
}
