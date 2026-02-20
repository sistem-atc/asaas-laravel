<?php

namespace SistemAtc\Asaas\DTO\Response\Bill;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusBill;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class BillResponseDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?StatusBill $status = null,
        public readonly ?float $value = null,
        public readonly ?float $discount = null,
        public readonly ?float $interest = null,
        public readonly ?float $fine = null,
        public readonly ?string $identificationField = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $scheduleDate = null,
        public readonly ?string $paymentDate = null,
        public readonly ?float $fee = null,
        public readonly ?string $description = null,
        public readonly ?string $companyName = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?bool $canBeCancelled = null,
        public readonly ?string $externalReference = null,
        public readonly ?array $failReasons = [],
    ) {}
}