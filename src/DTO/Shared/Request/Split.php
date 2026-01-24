<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

class Split
{
    public function __construct(
        public readonly string $walletId,
        public readonly ?float $fixedValue,
        public readonly ?float $percentualValue,
        public readonly ?float $totalFixedValue,
        public readonly ?string $externalReference,
        public readonly ?string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            walletId: $data['walletId'] ?? null,
            fixedValue: $data['fixedValue'] ?? null,
            percentualValue: $data['percentualValue'] ?? null,
            totalFixedValue: $data['totalFixedValue'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            description: $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'walletId' => $this->walletId,
            'fixedValue' => $this->fixedValue,
            'percentualValue' => $this->percentualValue,
            'totalFixedValue' => $this->totalFixedValue,
            'externalReference' => $this->externalReference,
            'description' => $this->description,
        ], fn($value) => !is_null($value));
    }

}
