<?php

namespace SistemAtc\Asaas\DTO\Request\Subscription;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

final class UpdateSubscriptionCreditCardRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly CreditCard $creditCard,
        public readonly CreditCardHolderInfo $creditCardHolderInfo,
        public readonly ?string $creditCardToken = null,
        public readonly string $remoteIp,
    ) {}
}