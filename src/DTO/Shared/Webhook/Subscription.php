<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Webhook\Split;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Webhook\Discount;

class Subscription implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $customer = null,
        public readonly ?string $paymentLink = null,
        public readonly ?float $value = null,
        public readonly ?string $nextDueDate = null,
        public readonly ?string $cycle = null,
        public readonly ?string $description = null,
        public readonly ?string $billingType = null,
        public readonly ?bool $deleted = null,
        public readonly ?string $status = null,
        public readonly ?string $externalReference = null,
        public readonly ?bool $sendPaymentByPostalService = null,
        public readonly ?Discount $discount = null,
        public readonly ?Penalty $fine = null,
        public readonly ?Penalty $interest = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
    ) {}
}