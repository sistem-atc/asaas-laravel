<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class ImmediateQrCode implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $pixKey = null,
        public readonly int $expirationSeconds,
        public readonly float $originalValue,
        public readonly ?string $description,
    ) {}
}