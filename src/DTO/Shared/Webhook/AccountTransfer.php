<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;

class AccountTransfer implements DTOInterface
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $cpfCnpj,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'cpfCnpj' => $this->cpfCnpj,
        ], fn($value) => !is_null($value));
    }
}
