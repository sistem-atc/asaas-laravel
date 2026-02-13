<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\CreditCard as EnumCreditCard;

class CreditCard implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $creditCardNumber = null,
        public readonly ?EnumCreditCard $creditCardBrand = null,
        public readonly ?string $creditCardToken = null,
    ) {}
}