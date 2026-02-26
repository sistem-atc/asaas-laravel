<?php

namespace SistemAtc\Asaas\DTO\Response\Subscription;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\Taxes;
use SistemAtc\Asaas\Enum\InvoiceIssuancePeriod;

final class ConfigurationInvoicesResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $municipalServiceId = null,
        public readonly ?string $municipalServiceCode = null,
        public readonly ?string $municipalServiceName = null,
        public readonly ?float $deductions = null,
        public readonly ?InvoiceIssuancePeriod $invoiceCreationPeriod = null,
        public readonly ?int $daysBeforeDueDate = null,
        public readonly ?bool $receivedOnly = null,
        public readonly ?string $observations = null,
        public readonly ?Taxes $taxes = null,
    ) {}
}