<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AccountTransfer implements DTOInterface
{

    use CastToArray;

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
}