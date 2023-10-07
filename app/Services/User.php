<?php

namespace App\Services;

use App\Models\User as UserModel;
use App\Entities\User as UserEntity;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Support\Facades\Hash;

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
            Hash::make($password) // modifying input as needed for upcoming db call
        );
    }

    /**
     * @param string $email
     * @param string $password
     * @return UserEntity
     */
    public static function login(string $email, string $password): UserEntity
    {
        $user = UserModel::loadOneBy('email', $email);
        if (!$user) {
            throw new BadRequestHttpException('Login failed!');
        }

        if (!Hash::check($password, $user->getPassword())) {
            throw new BadRequestHttpException('Login failed!');
        }

        return $user;
    }
}
