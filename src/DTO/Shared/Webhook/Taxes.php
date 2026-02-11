<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Taxes implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?bool $retainIss = null,
        public readonly ?float $iss = null,
        public readonly ?float $cofins = null,
        public readonly ?float $csll = null,
        public readonly ?float $inss = null,
        public readonly ?float $ir = null,
        public readonly ?float $pis = null,
    ) {}
}