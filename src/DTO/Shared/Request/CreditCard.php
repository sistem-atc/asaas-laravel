<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditCard implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $holderName,
        public readonly string $number,
        public readonly string $expiryMonth,
        public readonly string $expiryYear,
        public readonly string $ccv,
    ) {}
}
