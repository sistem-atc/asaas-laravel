<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\General;
use SistemAtc\Asaas\Enum\Documentation;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CommercialInfo;
use SistemAtc\Asaas\Enum\BankAccountInfo;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AccountStatus implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?CommercialInfo $commercialInfo = null,
        public readonly ?BankAccountInfo $bankAccountInfo = null,
        public readonly ?Documentation $documentation = null,
        public readonly ?General $general = null,
    ) {}
}