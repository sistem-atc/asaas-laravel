<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;

final class UpdatePaymentRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly BillingType $billingType,
        public readonly float $value,
        public readonly string $dueDate,
        public readonly ?string $description = null,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation = null,
        public readonly ?string $externalReference = null,
        public readonly ?Penalty $discount = null,
        public readonly ?Penalty $interest = null,
        public readonly ?Penalty $fine = null,
        public readonly ?bool $postalService = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
        public readonly ?Callback $callback = null,
    ) {}
}