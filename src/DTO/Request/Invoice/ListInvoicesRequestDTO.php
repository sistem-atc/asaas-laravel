<?php

namespace SistemAtc\Asaas\DTO\Request\Invoice;

use SistemAtc\Asaas\Enum\InvoiceStatus;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListInvoicesRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $effectiveDate__ge = null,
        public readonly ?string $effectiveDate__le = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?string $externalReference = null,
        public readonly ?InvoiceStatus $status = null,
        public readonly ?string $customer = null,
    ) {}
}
