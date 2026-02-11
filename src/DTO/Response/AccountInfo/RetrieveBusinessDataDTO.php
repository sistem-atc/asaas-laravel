<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\City;
use SistemAtc\Asaas\DTO\Shared\Response\CommercialInfoExpiration;
use SistemAtc\Asaas\Enum\StatusRetrieveBusinessData;
use SistemAtc\Asaas\Enum\TypeCompany;
use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveBusinessDataDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

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
}