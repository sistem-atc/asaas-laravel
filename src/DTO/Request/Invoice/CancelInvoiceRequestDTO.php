<?php

namespace SistemAtc\Asaas\DTO\Request\Invoice;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class CancelInvoiceRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?bool $cancelOnlyOnAsaas = null,
    ) {}
}