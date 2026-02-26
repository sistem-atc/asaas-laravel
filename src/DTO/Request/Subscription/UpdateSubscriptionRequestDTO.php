<?php

namespace SistemAtc\Asaas\DTO\Request\Subscription;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusSubscription;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;

final class UpdateSubscriptionRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?BillingType $billingType = null,
        public readonly ?StatusSubscription $status = null,
        public readonly ?string $nextDueDate = null,
        public readonly ?Discount $discount = null,
        public readonly ?Interest $interest = null,
        public readonly ?Fine $fine = null,
        public readonly ?CycleSubscription $cycle = null,
        public readonly ?string $description = null,
        public readonly ?string $endDate = null,
        public readonly ?bool $updatePendingPayments = null,
        public readonly ?string $externalReference = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
        public readonly ?Callback $callback = null,
    ) {}
}