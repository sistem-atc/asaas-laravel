<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusSubscription;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;

final class UpdateSubscriptionRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?BillingType $billingType,
        public readonly ?StatusSubscription $status,
        public readonly ?string $nextDueDate,
        public readonly ?Penalty $discount,
        public readonly ?Penalty $interest,
        public readonly ?Penalty $fine,
        public readonly ?CycleSubscription $cycle,
        public readonly ?string $description,
        public readonly ?string $endDate,
        public readonly ?bool $updatePendingPayments,
        public readonly ?string $externalReference,
        #[ArrayOf(Split::class)] public readonly ?array $split,
        public readonly ?Callback $callback,
    ) {}
}