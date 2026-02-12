<?php

namespace SistemAtc\Asaas\Attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class MultipartFile {
    public function __construct(
        public string $as = 'file'
    ) {}
}