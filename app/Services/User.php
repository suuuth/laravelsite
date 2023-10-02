<?php

namespace App\Services;

use App\Models\User as UserModel;

class User
{
    /**
     * @param string $email
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function register(string $email, string $username, string $password): bool
    {
        return UserModel::create(
            $email,
            $username,
            bcrypt($password) // modifying input as needed for upcoming db call
        );
    }

    public static function login(string $email, string $password): bool
    {
        $user = UserModel::loadOneBy(['email' => $email]);
        if (!$user) {
            return false;
        }

        return $user;
    }
}
