<?php

namespace SistemAtc\Asaas\DTO\Request\Subaccount;

use SistemAtc\Asaas\Enum\TypeCompany;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Request\Webhook\CreateRequestDTO;

final class SubAccountRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $loginEmail = null,
        public readonly string $cpfCnpj,
        public readonly ?string $birthDate = null,
        public readonly ?TypeCompany $companyType = null,
        public readonly ?string $phone = null,
        public readonly string $mobilePhone,
        public readonly ?string $site = null,
        public readonly float $incomeValue,
        public readonly string $address,
        public readonly string $addressNumber,
        public readonly ?string $complement = null,
        public readonly string $province,
        public readonly string $postalCode,
        #[ArrayOf(CreateRequestDTO::class)] public readonly ?array $webhooks = null,
    ) {}
}