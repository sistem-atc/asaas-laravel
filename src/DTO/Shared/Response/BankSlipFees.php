<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class BankSlipFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $defaultValue,
        public readonly ?float $discountValue,
        public readonly ?string $expirationDate,
        public readonly ?int $daysToReceive,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            defaultValue: isset($data['defaultValue']) ? (float) $data['defaultValue'] : null,
            discountValue: isset($data['discountValue']) ? (float) $data['discountValue'] : null,
            expirationDate: $data['expirationDate'] ?? null,
            daysToReceive: $data['daysToReceive'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($v) => !is_null($v));
    }
}