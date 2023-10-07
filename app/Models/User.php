<?php

namespace App\Models;

use App\Entities\User as UserEntity;
use DateTime;
use Illuminate\Support\Facades\DB;

class User extends BaseModel
{
    protected UserEntity $instance;

    const table = 'Users';
    const returnType = UserEntity::class;


    /**
     * @param string $email
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function create(string $email, string $username, string $password): bool
    {
        return DB::insert('INSERT INTO Users (email, username, password, created) VALUES (?, ?, ?, ?)', [
            $email,
            $username,
            $password,
            new DateTime
        ]);
    }
}
