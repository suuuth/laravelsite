<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class BaseModel
{
    public static function create(mixed $class): bool
    {
        $classData = [];
        forEach ($class as $prop => $value) {
            $classData[$prop] = $value;
        }

        DB::insert(sprintf(
            'INSERT INTO TABLE %s VALUES (%s)',
            'test',
            implode(',', $classData)
        ));

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
