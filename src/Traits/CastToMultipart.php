<?php

namespace SistemAtc\Asaas\Traits;

use ReflectionClass;
use SistemAtc\Asaas\Attributes\MultipartFile;

trait CastToMultipart
{
    public function toMultipart(): array
    {
        $fields = [];
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $name = $property->getName();
            $value = $property->getValue($this);
            
            if (is_null($value)) continue;
            
            $fileAttribute = $property->getAttributes(MultipartFile::class)[0] ?? null;

            if ($fileAttribute) {
                $fieldName = $fileAttribute->newInstance()->as;
                if (str_contains($name, 'logo')) {
                    $fileData = file_get_contents($value);
                    $fileName = basename($value);
                    $mimeType = mime_content_type($value);
                    $contents = "data:{$mimeType};name={$fileName};base64," . base64_encode($fileData);
                    $fields[] = [
                        'name'     => $fieldName,
                        'filename' => $fileName,
                        'contents' => $contents
                    ];
                } 
                else {
                    $fields[] = [
                        'name'     => $fieldName,
                        'contents' => fopen($value, 'r'),
                        'filename' => basename($value)
                    ];
                }
                continue;
            }

            $finalValue = match (true) {
                is_bool($value) => $value ? 'true' : 'false',
                $value instanceof \UnitEnum => $value->value,
                is_array($value) => json_encode($value),
                default => (string) $value,
            };

            $fields[] = [
                'name'     => $name,
                'contents' => $finalValue,
            ];
        }

        return [
            'multipart' => $fields
        ];
    }
}