<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\AccountStatusEnum;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class AccountStatus implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?AccountStatusEnum $commercialInfo = null,
        public readonly ?AccountStatusEnum $bankAccountInfo = null,
        public readonly ?AccountStatusEnum $documentation = null,
        public readonly ?AccountStatusEnum $general = null,
    ) {}
}