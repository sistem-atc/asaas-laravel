<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditCardHolderInfo implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $cpfCnpj,
        public readonly string $postalCode,
        public readonly string $addressNumber,
        public readonly string $phone,
        public readonly ?string $addressComplement = null,
        public readonly ?string $mobilePhone = null,
    ) {}
}