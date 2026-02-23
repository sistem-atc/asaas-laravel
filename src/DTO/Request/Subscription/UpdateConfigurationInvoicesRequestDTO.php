<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Taxes;
use SistemAtc\Asaas\Enum\InvoiceIssuancePeriod;

final class UpdateConfigurationInvoicesRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $deductions = null,
        public readonly ?InvoiceIssuancePeriod $effectiveDatePeriod = null,
        public readonly ?bool $receivedOnly = null,
        public readonly ?int $daysBeforeDueDate = null,
        public readonly ?string $observations = null,
        public readonly Taxes $taxes,
    ) {}
}