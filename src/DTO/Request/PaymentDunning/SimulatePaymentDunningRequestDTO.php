<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDunning;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class SimulatePaymentDunningRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $payment,
    ) {}
}
