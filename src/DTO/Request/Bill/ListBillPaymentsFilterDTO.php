<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class ListBillPaymentsFilterDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
    ) {}
}