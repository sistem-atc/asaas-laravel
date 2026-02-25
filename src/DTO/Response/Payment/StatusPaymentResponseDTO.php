<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;

final class StatusPaymentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?StatusPayment $status,
    ) {}
}