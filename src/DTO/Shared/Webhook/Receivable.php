<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\StatusReceivable;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Receivable implements DTOInterface
{
    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $installment,
        public readonly ?string $payment,
        public readonly ?StatusReceivable $status,
        public readonly ?string $anticipationDate,
        public readonly ?string $dueDate,
        public readonly ?string $requestDate,
        public readonly ?float $fee,
        public readonly ?int $anticipationDays,
        public readonly ?float $netValue,
        public readonly ?float $totalValue,
        public readonly ?float $value,
        public readonly ?string $denialObservation,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            installment: $data['installment'] ?? null,
            payment: $data['payment'] ?? null,
            status: isset($data['status']) ? StatusReceivable::tryFrom($data['status']) : null,
            anticipationDate: $data['anticipationDate'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            requestDate: $data['requestDate'] ?? null,
            fee: isset($data['fee']) ? (float) $data['fee'] : null,
            anticipationDays: isset($data['anticipationDays']) ? (int) $data['anticipationDays'] : null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            totalValue: isset($data['totalValue']) ? (float) $data['totalValue'] : null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            denialObservation: $data['denialObservation'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'object' => $this->object,
            'id' => $this->id,
            'installment' => $this->installment,
            'payment' => $this->payment,
            'status' => $this->status?->value,
            'anticipationDate' => $this->anticipationDate,
            'dueDate' => $this->dueDate,
            'requestDate' => $this->requestDate,
            'fee' => $this->fee,
            'anticipationDays' => $this->anticipationDays,
            'netValue' => $this->netValue,
            'totalValue' => $this->totalValue,
            'value' => $this->value,
            'denialObservation' => $this->denialObservation,
        ], fn($value) => !is_null($value));
    }
}
