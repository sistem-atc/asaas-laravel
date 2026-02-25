<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class SimulationPayment implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $netValue = null,
        public readonly ?float $feePercentage = null,
        public readonly ?float $operationFee = null,
        public readonly ?InstallmentSimulator $installment = null,
    ) {}
}
