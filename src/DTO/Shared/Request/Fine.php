<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Enum\DiscountType;

class Fine
{
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

    public function toArray(): array
    {
        return array_filter([
            'value' => $this->value,
            'type' => $this->type?->value,
        ], fn($value) => !is_null($value));
    }
}
