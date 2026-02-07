<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditCardHolderInfo implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $cpfCnpj,
        public readonly ?string $postalCode,
        public readonly ?string $addressNumber,
        public readonly ?string $addressComplement,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            cpfCnpj: isset($data['cpfCnpj']) ? preg_replace('/\D/', '', $data['cpfCnpj']) : null,
            postalCode: isset($data['postalCode']) ? preg_replace('/\D/', '', $data['postalCode']) : null,
            addressNumber: $data['addressNumber'] ?? null,
            addressComplement: $data['addressComplement'] ?? null,
            phone: isset($data['phone']) ? preg_replace('/\D/', '', $data['phone']) : null,
            mobilePhone: isset($data['mobilePhone']) ? preg_replace('/\D/', '', $data['mobilePhone']) : null,
        );
    }
}