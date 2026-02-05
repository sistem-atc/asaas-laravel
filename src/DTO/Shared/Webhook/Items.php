<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;

class Items implements DTOInterface
{
public function __construct(
        public readonly ?string $name,
        public readonly ?string $description,
        public readonly ?int $quantity,
        public readonly ?float $value,
    ) {}

    public static function fromArray(array $data): self {
        return new self(
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            quantity: isset($data['quantity']) ? (int) $data['quantity'] : null,
            value: isset($data['value']) ? (float) $data['value'] : null,
        );
    }

    public function toArray(): array {
        return array_filter(get_object_vars($this), fn($v) => !is_null($v));
    }
}
