<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Enum\DiscountType;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Fine implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $value,
        public readonly ?DiscountType $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: $data['value'] ?? null,
            type: isset($data['type']) ? DiscountType::tryFrom($data['type']) : null,
        );
    }
}