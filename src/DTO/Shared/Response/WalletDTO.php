<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class WalletDTO implements DTOInterface
{

    use CastToArray;

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
}