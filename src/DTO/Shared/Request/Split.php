<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class Split implements DTOInterface
{
    
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $walletId,
        public readonly ?float $fixedValue = null,
        public readonly ?float $percentualValue = null,
        public readonly ?float $totalFixedValue = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $description = null,
        public readonly ?string $installmentNumber = null,
    ) {}
}