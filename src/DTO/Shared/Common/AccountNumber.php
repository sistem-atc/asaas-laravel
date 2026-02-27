<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AccountNumber implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $agency = null,
        public readonly ?string $account = null,
        public readonly ?string $accountDigit = null,
    ) {}
}