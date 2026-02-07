<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class ListCustomer implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $cpfCnpj,
        public readonly ?string $groupName,
        public readonly ?string $externalReference
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            offset: (int) ($data['offset'] ?? 0),
            limit: (int) ($data['limit'] ?? 100),
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            groupName: $data['groupName'] ?? null,
            externalReference: $data['externalReference'] ?? null
        );
    }
}