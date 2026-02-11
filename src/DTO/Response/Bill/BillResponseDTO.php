<?php

namespace SistemAtc\Asaas\DTO\Response\Bill;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BillStatus;
use SistemAtc\Asaas\Traits\AutoHydrate;

class BillResponseDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?BillStatus $status,
        public readonly ?float $value,
        public readonly ?float $discount,
        public readonly ?float $interest,
        public readonly ?float $fine,
        public readonly ?string $identificationField,
        public readonly ?string $dueDate,
        public readonly ?string $scheduleDate,
        public readonly ?string $paymentDate,
        public readonly ?float $fee,
        public readonly ?string $description,
        public readonly ?string $companyName,
        public readonly ?string $transactionReceiptUrl,
        public readonly ?bool $canBeCancelled,
        public readonly ?string $externalReference,
        public readonly ?array $failReasons = [],
    ) {}
}