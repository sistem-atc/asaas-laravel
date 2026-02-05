<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditCard implements DTOInterface
{
    public function __construct(
        public readonly ?string $holderName,
        public readonly ?string $number,
        public readonly ?string $expiryMonth,
        public readonly ?string $expiryYear,
        public readonly ?string $ccv,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            holderName: $data['holderName'] ?? null,
            number: isset($data['number']) ? preg_replace('/\D/', '', $data['number']) : null,
            expiryMonth: $data['expiryMonth'] ?? null,
            expiryYear: $data['expiryYear'] ?? null,
            ccv: $data['ccv'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'holderName' => $this->holderName,
            'number' => $this->number,
            'expiryMonth' => $this->expiryMonth,
            'expiryYear' => $this->expiryYear,
            'ccv' => $this->ccv,
        ], fn($value) => !is_null($value));
    }
}
