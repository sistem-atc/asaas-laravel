<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class AccessToken
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?string $expirationDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            expirationDate: $data['expirationDate'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'expirationDate' => $this->expirationDate,
        ], fn($value) => !is_null($value));
    }

}
