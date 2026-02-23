<?php

namespace SistemAtc\Asaas\Traits;

use DateTime;
use BackedEnum;
use ReflectionClass;
use DateTimeInterface;
use ReflectionNamedType;
use SistemAtc\Asaas\Attributes\ArrayOf;

trait AutoHydrate
{
    public static function fromArray(array $data): static
    {
        $reflection = new ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new static();
        }

        $params = [];
        foreach ($constructor->getParameters() as $param) {
            $name = $param->getName();
            $type = $param->getType();
            $value = $data[$name] ?? null;

            if ($value === null) {
                $params[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                continue;
            }

            if ($type instanceof ReflectionNamedType) {
                $typeName = $type->getName();

                if ($type->isBuiltin()) {
                    if ($typeName === 'float' && !is_float($value)) {
                        $value = (float) $value;
                    }
                    elseif ($typeName === 'int' && !is_int($value)) {
                        $value = (int) $value;
                    }
                    elseif ($typeName === 'bool' && !is_bool($value)) {
                        $value = (bool) $value;
                    }
                    elseif ($typeName === 'array') {
                        $attributes = $param->getAttributes(ArrayOf::class);
                        if (!empty($attributes) && is_array($value)) {
                            $targetClass = $attributes[0]->newInstance()->class;
                            if (method_exists($targetClass, 'fromArray')) {
                                $value = array_map(function($item) use ($targetClass, $name) {
                                    if (!is_array($item)) {
                                        throw new \InvalidArgumentException(
                                            "All items in '{$name}' must be arrays, " . gettype($item) . " given"
                                        );
                                    }
                                    return $targetClass::fromArray($item);
                                }, $value);
                            }
                        }
                    }
                }
                else {
                    if (is_subclass_of($typeName, BackedEnum::class)) {
                            $enum = $typeName::tryFrom($value);
                            if ($enum === null) {
                                throw new \InvalidArgumentException("Invalid value '{$value}' for {$typeName} in '{$name}'");
                            }
                            $value = $enum;
                    }
                    elseif ($typeName === DateTimeInterface::class || $typeName === DateTime::class) {
                        $value = is_string($value) ? new DateTime($value) : $value;
                    }
                    elseif (method_exists($typeName, 'fromArray')) {
                        $value = is_array($value) ? $typeName::fromArray($value) : $value;
                    }
                }
            }

            $params[] = $value;
        }

        return new static(...$params);
    }
}