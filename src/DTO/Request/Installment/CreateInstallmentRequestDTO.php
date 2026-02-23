<?php

namespace SistemAtc\Asaas\DTO\Request\Installment;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;

final class CreateInstallmentRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly int $installmentCount,
        public readonly string $customer,
        public readonly float $value,
        public readonly ?float $totalValue,
        public readonly BillingType $billingType,
        public readonly string $dueDate,
        public readonly ?string $description,
        public readonly ?bool $postalService,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation,
        public readonly ?string $paymentExternalReference,
        public readonly ?Penalty $discount,
        public readonly ?Penalty $interest,
        public readonly ?Penalty $fine,
        #[ArrayOf(Split::class)] public readonly ?array $splits,
    ) {}
}
