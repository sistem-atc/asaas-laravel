<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class SplitCheckout implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $walletId,
        public readonly ?float $fixedValue = null,
        public readonly ?float $percentualValue = null,
        public readonly ?float $totalFixedValue = null,
    ) {}
}