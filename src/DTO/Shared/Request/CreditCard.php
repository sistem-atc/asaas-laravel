<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditCard implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $holderName = null,
        public readonly ?string $number = null,
        public readonly ?string $expiryMonth = null,
        public readonly ?string $expiryYear = null,
        public readonly ?string $ccv = null,
    ) {}
}
