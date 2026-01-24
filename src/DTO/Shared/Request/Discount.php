<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Enum\DiscountType;

class Discount
{
    public function __construct(
        public readonly ?float $value,
        public readonly ?int $dueDateLimitDays,
        public readonly ?DiscountType $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: $data['value'] ?? null,
            dueDateLimitDays: $data['dueDateLimitDays'] ?? null,
            type: isset($data['type']) ? DiscountType::tryFrom($data['type']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'value' => $this->value,
            'dueDateLimitDays' => $this->dueDateLimitDays,
            'type' => $this->type?->value,
        ], fn($value) => !is_null($value));
    }

}
