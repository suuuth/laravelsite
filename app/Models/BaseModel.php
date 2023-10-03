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

//    private function setPropertyValues(array $props): void
//    {
//        foreach ($props as $property => $value) {
//            if (method_exists($this, 'set'.$property)) {
//                $this->{'set'.$property}($value);
//            }
//        }
//    }

    /**
     * @param $params
     */
    public static function instance($params)
    {
        $entityInstance = new (static::returnType)();

        foreach ($params as $prop => $value) {
            if (!method_exists($entityInstance, sprintf('set%s', ucfirst($prop)))) {
                continue;
            }

            $entityInstance->{sprintf('set%s', ucfirst($prop))}($value);
        }

        return $entityInstance;
    }

    public function getInstance()
    {
        return $this->instance;
    }

    public static function loadOneBy(string $column, int|string|bool $value)
    {
        if (!method_exists(static::returnType, 'set'.ucfirst($column))) {
            throw new Exception(sprintf('Bad column %s', $column));
        }

        $row = DB::selectOne(
            sprintf(
                'SELECT * FROM %s WHERE %s = :%s',
                static::table,
                $column,
                $column
            ), [
                $column => $value
            ]
        );

        die(var_dump(new \DateTime($row->created)));

        return static::instance($row);
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
