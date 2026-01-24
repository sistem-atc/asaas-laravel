<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

class CreditCard
{
    public function __construct(
        public readonly ?string $creditCardNumber,
        public readonly ?string $creditCardBrand,
        public readonly ?string $creditCardToken,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCardNumber: $data['creditCardNumber'] ?? null,
            creditCardBrand: $data['creditCardBrand'] ?? null,
            creditCardToken: $data['creditCardToken'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'creditCardNumber' => $this->creditCardNumber,
            'creditCardBrand' => $this->creditCardBrand,
            'creditCardToken' => $this->creditCardToken,
        ], fn($value) => !is_null($value));
    }
}
