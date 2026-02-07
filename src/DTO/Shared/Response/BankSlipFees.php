<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class BankSlipFees implements DTOInterface
{

    use CastToArray;

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
}