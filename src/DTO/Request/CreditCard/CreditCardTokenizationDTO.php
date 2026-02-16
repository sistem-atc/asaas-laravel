<?php

namespace SistemAtc\Asaas\DTO\Request\Chargeback;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

class CreditCardTokenizationDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly string $customer,
        public readonly CreditCard $creditCard,
        public readonly CreditCardHolderInfo $creditCardHolderInfo,
        public readonly string $remoteIp,
    ) {}
}