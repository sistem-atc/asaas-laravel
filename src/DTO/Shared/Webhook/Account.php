<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;

class Account implements DTOInterface
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $ownerId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            ownerId: $data['ownerId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'ownerId' => $this->ownerId,
        ], fn($value) => !is_null($value));
    }
}
