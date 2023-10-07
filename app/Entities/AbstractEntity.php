<?php

namespace App\Entities;

use stdClass;

trait AbstractEntity
{
    protected function setPropertyValues(array|stdClass $params)
    {
        if ($params instanceof stdClass) {
            $params = (array) $params;
        }

        foreach ($params as $prop => $value) {
            if (!method_exists($this, sprintf('set%s', ucfirst($prop)))) {
                continue;
            }

            if (isset($this->casts[$prop])) {
                if (str_contains($this->casts[$prop], '?') && is_null($value)) {
                    continue;
                }

                $value = $this->{sprintf(
                    '%sto%s',
                    lcfirst(gettype($value)),
                    ucfirst($this->casts[$prop])
                )}($value);
            }

            $this->{sprintf('set%s', ucfirst($prop))}($value);
        }
    }

    public static function instance($params)
    {
        $instance = new (static::class);
        $instance->setPropertyValues($params);
        return $instance;
    }
}
