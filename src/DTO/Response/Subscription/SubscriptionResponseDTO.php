<?php

namespace SistemAtc\Asaas\DTO\Response\Subscription;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Enum\BillingTypeEscrow;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusSubscription;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Response\Split;

final class SubscriptionResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $customer = null,
        public readonly ?string $paymentLink = null,
        public readonly ?BillingTypeEscrow $billingType = null,
        public readonly ?CycleSubscription $cycle = null,
        public readonly ?float $value = null,
        public readonly ?string $nextDueDate = null,
        public readonly ?string $endDate = null,
        public readonly ?string $description = null,
        public readonly ?StatusSubscription $status = null,
        public readonly ?Penalty $discount = null,
        public readonly ?Penalty $fine = null,
        public readonly ?Penalty $interest = null,
        public readonly ?bool $deleted = null,
        public readonly ?int $maxPayments = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $checkoutSession = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
    ) {}
}