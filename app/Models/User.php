<?php

namespace App\Models;

use App\Entities\User as UserEntity;
use DateTime;
use Illuminate\Support\Facades\DB;

class User extends BaseModel
{
    protected UserEntity $userInstance;

    protected string $table = 'Users';


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


    /**
     * @return UserEntity
     */
    public function getUserInstance(): UserEntity
    {
        return $this->userInstance;
    }

    /**
     * @param UserEntity $userInstance
     * @return User
     */
    public function setUserInstance(UserEntity $userInstance): User
    {
        $this->userInstance = $userInstance;
        return $this;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return User
     */
    public function setTable(string $table): User
    {
        $this->table = $table;
        return $this;
    }
}
