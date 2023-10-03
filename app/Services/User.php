<?php

namespace App\Services;

use App\Models\User as UserModel;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
            password_hash($password, PASSWORD_BCRYPT) // modifying input as needed for upcoming db call
        );
    }

    /**
     * @param string $email
     * @param string $password
     * @return UserModel
     */
    public static function login(string $email, string $password): UserModel
    {
        dd(UserModel::loadOneBy('email', $email));
        $user = UserModel::loadOneBy('email', $email);
        if (!$user) {
            throw new BadRequestHttpException('Login failed!');
        }

        if (!password_verify($password, $user->getInstance()->getPassword())) {
            throw new BadRequestHttpException('Login failed!');
        }

        return $user;
    }
}
