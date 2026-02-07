<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\City;
use SistemAtc\Asaas\DTO\Shared\Response\CommercialInfoExpiration;
use SistemAtc\Asaas\Enum\StatusRetrieveBusinessData;
use SistemAtc\Asaas\Enum\TypeCompany;
use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveBusinessDataDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?StatusRetrieveBusinessData $status,
        public readonly ?TypePerson $personType,
        public readonly ?string $cpfCnpj,
        public readonly ?string $name,
        public readonly ?string $birthDate,
        public readonly ?string $companyName,
        public readonly ?TypeCompany $companyType,
        public readonly ?float $incomeValue,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
        public readonly ?string $postalCode,
        public readonly ?string $address,
        public readonly ?string $addressNumber,
        public readonly ?string $complement,
        public readonly ?string $province,
        public readonly ?City $city,
        public readonly ?string $denialReason,
        public readonly ?string $tradingName,
        public readonly ?string $site,
        public readonly ?array $availableCompanyNames,
        public readonly ?CommercialInfoExpiration $commercialInfoExpiration = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: isset($data['status']) ? StatusRetrieveBusinessData::tryFrom($data['status']) : null,
            personType: isset($data['personType']) ? TypePerson::tryFrom($data['personType']) : null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            name: $data['name'] ?? null,
            birthDate: $data['birthDate'] ?? null,
            companyName: $data['companyName'] ?? null,
            companyType: isset($data['companyType']) ? TypeCompany::tryFrom($data['companyType']) : null,
            incomeValue: isset($data['incomeValue']) ? (float) $data['incomeValue'] : null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            mobilePhone: $data['mobilePhone'] ?? null,
            postalCode: $data['postalCode'] ?? null,
            address: $data['address'] ?? null,
            addressNumber: $data['addressNumber'] ?? null,
            complement: $data['complement'] ?? null,
            province: $data['province'] ?? null,
            city: isset($data['city']) ? ($data['city'] instanceof City ? $data['city'] : City::fromArray($data['city'])) : null,
            denialReason: $data['denialReason'] ?? null,
            tradingName: $data['tradingName'] ?? null,
            site: $data['site'] ?? null,
            availableCompanyNames: $data['availableCompanyNames'] ?? [],
            commercialInfoExpiration: isset($data['commercialInfoExpiration']) ? ($data['commercialInfoExpiration'] instanceof CommercialInfoExpiration ? $data['commercialInfoExpiration'] : CommercialInfoExpiration::fromArray($data['commercialInfoExpiration'])) : null,
        );
    }
}