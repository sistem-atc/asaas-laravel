<?php

namespace SistemAtc\Asaas\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateFormat
{
    public function __construct(
        public string $format = 'Y-m-d'
    ) {}
}