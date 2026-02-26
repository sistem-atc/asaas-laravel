<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

final class PayChargeWithCreditCardRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?CreditCard $creditCard = null,
        public readonly ?CreditCardHolderInfo $creditCardHolderInfo = null,
        public readonly ?string $creditCardToken = null,
    ) {}
}