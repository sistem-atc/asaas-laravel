<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ConfirmCashRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $paymentDate,
        public readonly ?float $value,
        public readonly ?bool $notifyCustomer,
    ) {}
}
