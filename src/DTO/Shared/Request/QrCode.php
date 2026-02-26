<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class QrCode implements DTOInterface
{
    
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $payload,
        public readonly ?float $changeValue = null,
    ) {}
}