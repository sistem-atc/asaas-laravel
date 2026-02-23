<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class Taxes implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $nbsCode = null,
        public readonly ?string $taxSituationCode = null,
        public readonly ?string $taxClassificationCode = null,
        public readonly ?string $operationIndicatorCode = null,
        public readonly bool $retainIss,
        public readonly float $iss,
        public readonly ?string $pisCofinsRetentionType = null,
        public readonly ?string $pisCofinsTaxStatus = null,
        public readonly float $pis,
        public readonly float $cofins,
        public readonly float $csll,
        public readonly float $inss,
        public readonly float $ir,
        public readonly ?float $stateIbs,
        public readonly ?float $stateIbsValue,
        public readonly ?float $municipalIbs,
        public readonly ?float $municipalIbsValue,
        public readonly ?float $cbs,
        public readonly ?float $cbsValue,
    ) {}
}