<?php

namespace App\Models;

class BaseModel
{
    public static function create(): bool
    {
        return true;
    }

    public static function read(): bool
    {
        return true;
    }

    public static function update(): bool
    {
        return true;
    }

    public static function delete(): bool
    {
        return true;
    }
}
