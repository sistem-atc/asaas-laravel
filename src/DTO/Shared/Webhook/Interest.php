<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class Interest
{
    public function __construct(
        public readonly ?float $value,
        public readonly ?string $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: isset($data['value']) ? (float) $data['value'] : null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'value' => $this->value,
            'type' => $this->type,
        ], fn($value) => !is_null($value));
    }
}
