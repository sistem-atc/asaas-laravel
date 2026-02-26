<?php

namespace SistemAtc\Asaas\DTO\Request\Subscription;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

final class CreateSubscriptionCreditCardRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $customer,
        public readonly BillingType $billingType,
        public readonly float $value,
        public readonly string $nextDueDate,
        public readonly ?Discount $discount = null,
        public readonly ?Interest $interest = null,
        public readonly ?Fine $fine = null,
        public readonly CycleSubscription $cycle,
        public readonly ?string $description = null,
        public readonly ?string $endDate = null,
        public readonly ?int $maxPayments = null,
        public readonly ?string $externalReference = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
        public readonly ?Callback $callback = null,
        public readonly CreditCard $creditCard,
        public readonly CreditCardHolderInfo $creditCardHolderInfo,
        public readonly ?string $creditCardToken = null,
        public readonly string $remoteIp,
    ) {}
}