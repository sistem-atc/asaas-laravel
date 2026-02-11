<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\CommercialInfo;
use SistemAtc\Asaas\Enum\BankAccountInfo;
use SistemAtc\Asaas\Enum\Documentation;
use SistemAtc\Asaas\Enum\General;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class CheckAccountStatusDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id,
        public readonly ?CommercialInfo $commercialInfo,
        public readonly ?BankAccountInfo $bankAccountInfo,
        public readonly ?Documentation $documentation,
        public readonly ?General $general,
    ) {}
}