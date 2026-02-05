<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Webhook\AccountTransfer;

class Transfer implements DTOInterface
{
    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $status,
        public readonly ?string $effectiveDate,
        public readonly ?string $endToEndIdentifier,
        public readonly ?string $type,
        public readonly ?float $value,
        public readonly ?float $netValue,
        public readonly ?float $transferFee,
        public readonly ?string $scheduleDate,
        public readonly bool $authorized,
        public readonly ?string $walletId,
        public readonly ?string $failReason,
        public readonly ?string $transactionReceiptUrl,
        public readonly ?AccountTransfer $account,
        public readonly ?BankAccount $bankAccount,
        public readonly ?string $operationType,
        public readonly ?string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            dateCreated: $data['dateCreated'] ?? null,
            status: $data['status'] ?? null,
            effectiveDate: $data['effectiveDate'] ?? null,
            endToEndIdentifier: $data['endToEndIdentifier'] ?? null,
            type: $data['type'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            transferFee: isset($data['transferFee']) ? (float) $data['transferFee'] : null,
            scheduleDate: $data['scheduleDate'] ?? null,
            authorized: (bool) ($data['authorized'] ?? false),
            walletId: $data['walletId'] ?? null,
            failReason: $data['failReason'] ?? null,
            transactionReceiptUrl: $data['transactionReceiptUrl'] ?? null,
            account: isset($data['account']) ? AccountTransfer::fromArray($data['account']) : null,
            bankAccount: isset($data['bankAccount']) ? BankAccount::fromArray($data['bankAccount']) : null,
            operationType: $data['operationType'] ?? null,
            description: $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'object' => $this->object,
            'id' => $this->id,
            'dateCreated' => $this->dateCreated,
            'status' => $this->status,
            'effectiveDate' => $this->effectiveDate,
            'endToEndIdentifier' => $this->endToEndIdentifier,
            'type' => $this->type,
            'value' => $this->value,
            'netValue' => $this->netValue,
            'transferFee' => $this->transferFee,
            'scheduleDate' => $this->scheduleDate,
            'authorized' => $this->authorized,
            'walletId' => $this->walletId,
            'failReason' => $this->failReason,
            'transactionReceiptUrl' => $this->transactionReceiptUrl,
            'account' => $this->account?->toArray(),
            'bankAccount' => $this->bankAccount?->toArray(),
            'operationType' => $this->operationType,
            'description' => $this->description,

        ], fn($value) => !is_null($value));
    }
}
