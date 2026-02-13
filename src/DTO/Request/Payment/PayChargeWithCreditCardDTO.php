<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

class PayChargeWithCreditCardDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?CreditCard $creditCard,
        public readonly ?CreditCardHolderInfo $creditCardHolderInfo,
        public readonly ?string $creditCardToken,
    ) {}
}