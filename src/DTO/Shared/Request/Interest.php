<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;

class Interest implements DTOInterface
{
    public function __construct(
        public readonly ?float $value,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: $data['value'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'value' => $this->value,
        ], fn($value) => !is_null($value));
    }

}
