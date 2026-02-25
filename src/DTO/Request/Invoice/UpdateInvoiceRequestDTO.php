<?php

namespace SistemAtc\Asaas\DTO\Request\Invoice;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\Taxes;

final class UpdateInvoiceRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $serviceDescription = null,
        public readonly ?string $observations = null,
        public readonly ?string $externalReference = null,
        public readonly ?float $value = null,
        public readonly ?float $deductions = null,
        public readonly ?string $effectiveDate = null,
        public readonly ?bool $updatePayment = null,
        public readonly ?Taxes $taxes = null,
    ) {}
}
