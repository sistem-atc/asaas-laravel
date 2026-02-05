<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class DebitCardFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $operationValue,
        public readonly ?float $defaultPercentage,
        public readonly ?int $daysToReceive,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            operationValue: isset($data['operationValue']) ? (float) $data['operationValue'] : null,
            defaultPercentage: isset($data['defaultPercentage']) ? (float) $data['defaultPercentage'] : null,
            daysToReceive: $data['daysToReceive'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($v) => !is_null($v));
    }
}