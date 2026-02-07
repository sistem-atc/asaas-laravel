<?php

namespace SistemAtc\Asaas\DTO\Response\Bill;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BillStatus;

class BillResponseDTO implements DTOInterface
{
    use CastToArray;

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

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            status: isset($data['status']) ? BillStatus::tryFrom($data['status']) : null,
            value: (float) ($data['value'] ?? 0),
            discount: (float) ($data['discount'] ?? 0),
            interest: (float) ($data['interest'] ?? 0),
            fine: (float) ($data['fine'] ?? 0),
            identificationField: $data['identificationField'] ?? '',
            dueDate: $data['dueDate'] ?? null,
            scheduleDate: $data['scheduleDate'] ?? null,
            paymentDate: $data['paymentDate'] ?? null,
            fee: (float) ($data['fee'] ?? 0),
            description: $data['description'] ?? null,
            companyName: $data['companyName'] ?? null,
            transactionReceiptUrl: $data['transactionReceiptUrl'] ?? null,
            canBeCancelled: (bool) ($data['canBeCancelled'] ?? false),
            externalReference: $data['externalReference'] ?? null,
            failReasons: isset($data['failReasons']) ? array_filter($data['failReasons']) : [],
        );
    }
}