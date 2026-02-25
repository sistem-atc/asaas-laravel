<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\SimulationPayment;

final class SalesSimulatorResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?float $value = null,
        public readonly ?SimulationPayment $creditCard = null,
        public readonly ?SimulationPayment $bankSlip = null,
        public readonly ?SimulationPayment $pix = null,
    ) {}
}