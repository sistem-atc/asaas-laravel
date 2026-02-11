<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class SimulateBillPaymentDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $identificationField = null,
        public readonly ?string $barCode = null,
    ) {}
}