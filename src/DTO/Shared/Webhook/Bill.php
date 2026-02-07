<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\StatusBill;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Bill implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?StatusBill $status,
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
        public readonly bool $canBeCancelled,
        public readonly ?string $failReasons,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            status: isset($data['status']) ? StatusBill::tryFrom($data['status']) : null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            discount: isset($data['discount']) ? (float) $data['discount'] : null,
            interest: isset($data['interest']) ? (float) $data['interest'] : null,
            fine: isset($data['fine']) ? (float) $data['fine'] : null,
            identificationField: $data['identificationField'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            scheduleDate: $data['scheduleDate'] ?? null,
            paymentDate: $data['paymentDate'] ?? null,
            fee: isset($data['fee']) ? (float) $data['fee'] : null,
            description: $data['description'] ?? null,
            companyName: $data['companyName'] ?? null,
            transactionReceiptUrl: $data['transactionReceiptUrl'] ?? null,
            canBeCancelled: (bool) ($data['canBeCancelled'] ?? false),
            failReasons: $data['failReasons'] ?? null,
        );
    }
}