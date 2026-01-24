<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class Split
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $walletId,
        public readonly ?float $fixedValue,
        public readonly ?float $percentualValue,
        public readonly ?string $status,
        public readonly ?string $refusalReason,
        public readonly ?string $externalReference,
        public readonly ?string $description,
        public readonly ?string $totalFixedValue,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            walletId: $data['walletId'] ?? null,
            fixedValue: isset($data['fixedValue']) ? (float) $data['fixedValue'] : null,
            percentualValue: isset($data['percentualValue']) ? (float) $data['percentualValue'] : null,
            status: $data['status'] ?? null,
            refusalReason: $data['refusalReason'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            description: $data['description'] ?? null,
            totalFixedValue: $data['totalFixedValue'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'walletId' => $this->walletId,
            'fixedValue' => $this->fixedValue,
            'percentualValue' => $this->percentualValue,
            'status' => $this->status,
            'refusalReason' => $this->refusalReason,
            'externalReference' => $this->externalReference,
            'description' => $this->description,
            'totalFixedValue' => $this->totalFixedValue,
        ], fn($value) => !is_null($value));
    }
}
