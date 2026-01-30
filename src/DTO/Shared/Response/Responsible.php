<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\TypeDocument;

class Responsible
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?TypeDocument $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            type: isset($data['type']) ? TypeDocument::tryFrom($data['type']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type?->value,
        ], fn($value) => !is_null($value));
    }
}
