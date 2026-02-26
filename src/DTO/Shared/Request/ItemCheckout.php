<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class ItemCheckout implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $externalReference = null,
        public readonly ?string $description = null,
        public readonly string $imageBase64,
        public readonly string $name,
        public readonly int $quantity,
        public readonly float $value,
    ) {}
}