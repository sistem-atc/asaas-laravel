<?php

namespace SistemAtc\Asaas\Traits;

use BackedEnum;
use DateTimeInterface;

trait CastToArray
{
    public function toArray(): array
    {
        $data = get_object_vars($this);

        return array_filter(array_map(function ($value) {
            
            if (is_null($value)) return null;

            if ($value instanceof DateTimeInterface) return $value->format('Y-m-d H:i:s');

            if ($value instanceof BackedEnum) return $value->value;

            if (is_object($value) && method_exists($value, 'toArray')) return $value->toArray();

            if (is_array($value)) {
                return array_map(function ($item) {
                    if ($item instanceof BackedEnum) return $item->value;
                    if (is_object($item) && method_exists($item, 'toArray')) return $item->toArray();
                    return $item;
                }, $value);
            }

            return $value;
        }, $data), fn($v) => !is_null($v));
    }
}