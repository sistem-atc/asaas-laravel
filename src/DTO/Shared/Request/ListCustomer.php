<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

class ListCustomer
{

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

    public function toArray(): array
    {
        return array_filter([
            'offset' => $this->offset,
            'limit' => $this->limit,
            'name' => $this->name,
            'email' => $this->email,
            'cpfCnpj' => $this->cpfCnpj,
            'groupName' => $this->groupName,
            'externalReference' => $this->externalReference,
        ], fn($value) => !is_null($value));
    }
}
