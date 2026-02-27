<?php

namespace SistemAtc\Asaas\DTO\Response\Subaccount;

use SistemAtc\Asaas\Enum\TypeCompany;
use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\AccountNumber;
use SistemAtc\Asaas\DTO\Shared\Response\AccessToken;
use SistemAtc\Asaas\DTO\Shared\Response\CommercialInfoExpiration;

final class SubAccountResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $loginEmail = null,
        public readonly ?string $phone = null,
        public readonly ?string $mobilePhone = null,
        public readonly ?string $address = null,
        public readonly ?string $addressNumber = null,
        public readonly ?string $complement = null,
        public readonly ?string $province = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $birthDate = null,
        public readonly ?TypePerson $personType = null,
        public readonly ?TypeCompany $companyType = null,
        public readonly ?int $city = null,
        public readonly ?string $state = null,
        public readonly ?string $country = null,
        public readonly ?string $tradingName = null,
        public readonly ?string $site = null,
        public readonly ?string $walletId = null,
        public readonly ?AccountNumber $accountNumber = null,
        public readonly ?CommercialInfoExpiration $commercialInfoExpiration = null,
        public readonly ?AccessToken $accessToken = null,
        public readonly ?string $apiKey = null,
    ) {}
}