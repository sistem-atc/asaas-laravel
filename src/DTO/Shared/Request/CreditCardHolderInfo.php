<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditCardHolderInfo implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $addressNumber = null,
        public readonly ?string $addressComplement = null,
        public readonly ?string $phone = null,
        public readonly ?string $mobilePhone = null,
    ) {}
}