<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class DebitCardFees implements DTOInterface
{

    use CastToArray;

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
}