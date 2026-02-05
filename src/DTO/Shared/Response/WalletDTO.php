<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class WalletDTO implements DTOInterface
{
    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            get_object_vars($this), fn($v) => !is_null($v)
        );
    }
}