<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Entities\User as UserEntity;

class User extends BaseModel
{
    protected UserEntity $userInstance;
}
