<?php

namespace SistemAtc\Asaas\Traits;

use BackedEnum;
use ReflectionClass;
use DateTimeInterface;
use ReflectionProperty;
use SistemAtc\Asaas\Attributes\DateFormat;

trait CastToArray
{
    public function toArray(): array
    {
        $data = get_object_vars($this);
        $reflection = new ReflectionClass($this);
        $result = [];

        foreach ($data as $key => $value) {
            try {
                $property = $reflection->getProperty($key);
            } catch (\ReflectionException $e) {
                $property = null;
            }

            $formatted = $this->formatValue($value, $property);

            if ($formatted !== null) {
                $cleanKey = str_replace(
                    ['__le', '__ge', '__gt', '__lt'],
                    ['[le]', '[ge]', '[gt]', '[lt]'],
                    $key
                );
                
                $result[$cleanKey] = $formatted;
            }
        }

        return $result;
    }

    private function formatValue(mixed $value, ?ReflectionProperty $property = null): mixed
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof DateTimeInterface) {
            $format = 'Y-m-d';
            
            if ($property !== null) {
                $attributes = $property->getAttributes(DateFormat::class);
                
                if (empty($attributes)) {
                    $constructor = (new ReflectionClass($this))->getConstructor();
                    if ($constructor) {
                        foreach ($constructor->getParameters() as $param) {
                            if ($param->getName() === $property->getName()) {
                                $attributes = $param->getAttributes(DateFormat::class);
                                break;
                            }
                        }
                    }
                }

                if (!empty($attributes)) {
                    $format = $attributes[0]->newInstance()->format;
                }
            }
            
            return $value->format($format);
        }

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        if (is_object($value) && method_exists($value, 'toArray')) {
            return $value->toArray();
        }

        if (is_array($value)) {
            return array_map(fn($item) => $this->formatValue($item), $value);
        }

        return $value;
    }
}