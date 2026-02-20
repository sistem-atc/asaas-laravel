<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;

final class CreateSubscriptionRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $customer,
        public readonly BillingType $billingType,
        public readonly float $value,
        public readonly string $nextDueDate,
        public readonly ?Penalty $discount,
        public readonly ?Penalty $interest,
        public readonly ?Penalty $fine,
        public readonly ?CycleSubscription $cycle,
        public readonly ?string $description,
        public readonly ?string $endDate,
        public readonly ?int $maxPayments,
        public readonly ?string $externalReference,
        #[ArrayOf(Split::class)] public readonly ?array $split,
        public readonly ?Callback $callback,
    ) {}
}