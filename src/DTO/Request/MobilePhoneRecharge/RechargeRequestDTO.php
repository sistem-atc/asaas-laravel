<?php

namespace SistemAtc\Asaas\DTO\Request\MobilePhoneRecharge;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class RechargeRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly float $value,
        public readonly string $phoneNumber,
    ) {}
}
