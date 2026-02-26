<?php

namespace SistemAtc\Asaas\DTO\Request\Installment;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;

final class CreateInstallmentRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly int $installmentCount,
        public readonly string $customer,
        public readonly float $value,
        public readonly ?float $totalValue = null,
        public readonly BillingType $billingType,
        public readonly string $dueDate,
        public readonly ?string $description = null,
        public readonly ?bool $postalService = null,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation = null,
        public readonly ?string $paymentExternalReference = null,
        public readonly ?Discount $discount = null,
        public readonly ?Interest $interest = null,
        public readonly ?Fine $fine = null,
        #[ArrayOf(Split::class)] public readonly ?array $splits = null,
    ) {}
}
