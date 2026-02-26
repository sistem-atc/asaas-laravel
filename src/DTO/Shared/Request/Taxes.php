<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Taxes implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly bool $retainIss,
        public readonly float $cofins,
        public readonly float $csll,
        public readonly float $inss,
        public readonly float $ir,
        public readonly float $pis,
        public readonly float $iss,
    ) {}
}