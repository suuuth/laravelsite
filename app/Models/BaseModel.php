<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class BaseModel
{
    protected function __construct(array $props)
    {
        $this->setPropertyValues($props);
    }

    private function setPropertyValues(array $props): void
    {
        foreach ($props as $property => $value) {
            if (method_exists($this, 'set'.$property)) {
                $this->{'set'.$property}($value);
            }
        }
    }

    /**
     * @param $params
     * @return static
     */
    public static function instance($params): static
    {
        return new static($params);
    }

    public static function loadOneBy(array $data): static
    {
        return static::instance(DB::select('SELECT * FROM '.get_class(static).' WHERE '.array_key($data).' = '.$data[]))
    }

    /**
     * @param int $id
     * @return static
     */
//    public static function loadById(int $id): static
//    {
//        $query = sprintf(
//            'SELECT * FROM %s WHERE id = :id',
//            static::table
//        );
//
//        return static::instance(DB::select(
//            'SELECT * FROM '.get_class(static).' WHERE id = :id',
//        [
//            'id' => $id
//        ]
//        ));
//    }
}
