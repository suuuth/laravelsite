<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\DB;

class BaseModel
{
    protected function __construct($instance)
    {
        $this->instance = $instance;
    }

    public static function instance($params)
    {
        return new static((static::returnType)::instance($params));
    }

    public static function loadOneBy(string $column, int|string|bool $value)
    {
        if (!method_exists(static::returnType, 'set'.ucfirst($column))) {
            throw new Exception(sprintf('Bad column %s', $column));
        }

        return (static::returnType)::instance(DB::selectOne(
            sprintf(
                'SELECT * FROM %s WHERE %s = :%s',
                static::table,
                $column,
                $column
            ), [
                $column => $value
            ]
        ));
    }
}
