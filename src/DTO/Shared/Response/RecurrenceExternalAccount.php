<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class RecurrenceExternalAccount implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $financialInstitutionName = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $pixKey = null,
    ) {}
}