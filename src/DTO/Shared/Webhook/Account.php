<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Account implements DTOInterface
{

    use CastToArray;

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
}
