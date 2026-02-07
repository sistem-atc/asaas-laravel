<?php

namespace SistemAtc\Asaas\DTO\Request\AccountInfo;

use Carbon\Traits\Cast;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\TypeCompany;
use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Traits\CastToArray;

class UpdateBusinessDataDTO implements DTOInterface
{
    use CastToArray;
    
    public function __construct(
        public readonly ?TypePerson $personType,
        public readonly ?string $cpfCnpj,
        public readonly ?string $birthDate,
        public readonly ?TypeCompany $companyType,
        public readonly ?string $companyName,
        public readonly ?float $incomeValue,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
        public readonly ?string $site,
        public readonly ?string $postalCode,
        public readonly ?string $address,
        public readonly ?string $addressNumber,
        public readonly ?string $complement,
        public readonly ?string $province,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            personType: $data['personType'] instanceof TypePerson ? $data['personType'] : TypePerson::tryFrom($data['personType']) ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            birthDate: $data['birthDate'] ?? null,
            companyType: isset($data['companyType']) ? ($data['companyType'] instanceof TypeCompany ? $data['companyType'] : TypeCompany::tryFrom($data['companyType'])) : null,
            companyName: $data['companyName'] ?? null,
            incomeValue: isset($data['incomeValue']) ? (float) $data['incomeValue'] : null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            mobilePhone: $data['mobilePhone'] ?? null,
            site: $data['site'] ?? null,
            postalCode: $data['postalCode'] ?? null,
            address: $data['address'] ?? null,
            addressNumber: $data['addressNumber'] ?? null,
            complement: $data['complement'] ?? null,
            province: $data['province'] ?? null,
        );
    }
}