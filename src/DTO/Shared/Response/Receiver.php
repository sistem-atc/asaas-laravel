<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\AccountType;
use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Receiver implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $ispb = null,
        public readonly ?string $ispbName = null,
        public readonly ?string $name = null,
        public readonly ?string $tradingName = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?TypePerson $personType = null,
        public readonly ?AccountType $accountType = null,
    ) {}
}