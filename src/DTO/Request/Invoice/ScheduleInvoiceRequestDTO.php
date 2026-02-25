<?php

namespace SistemAtc\Asaas\DTO\Request\Invoice;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\Taxes;

final class ScheduleInvoiceRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?string $customer = null,
        public readonly string $serviceDescription,
        public readonly string $observations,
        public readonly ?string $externalReference = null,
        public readonly float $value,
        public readonly float $deductions,
        public readonly string $effectiveDate,
        public readonly ?string $municipalServiceId = null,
        public readonly ?string $municipalServiceCode = null,
        public readonly string $municipalServiceName,
        public readonly ?bool $updatePayment = null,
        public readonly Taxes $taxes,
    ) {}
}
