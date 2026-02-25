<?php

namespace SistemAtc\Asaas\DTO\Response\Invoice;

use SistemAtc\Asaas\Enum\TypeInvoice;
use SistemAtc\Asaas\Enum\InvoiceStatus;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\Taxes;

final class InvoiceResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceStatus $status = null,
        public readonly ?string $customer = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?TypeInvoice $type = null,
        public readonly ?string $statusDescription = null,
        public readonly ?string $serviceDescription = null,
        public readonly ?string $pdfUrl = null,
        public readonly ?string $xmlUrl = null,
        public readonly ?string $rpsSerie = null,
        public readonly ?string $rpsNumber = null,
        public readonly ?string $number = null,
        public readonly ?string $validationCode = null,
        public readonly ?float $value = null,
        public readonly ?float $deductions = null,
        public readonly ?string $effectiveDate = null,
        public readonly ?string $observations = null,
        public readonly ?string $estimatedTaxesDescription = null,
        public readonly ?string $externalReference = null,
        public readonly ?Taxes $taxes = null,
        public readonly ?array $municipalServiceId = null,
        public readonly ?array $municipalServiceCode = null,
        public readonly ?array $municipalServiceName = null,
    ) {}
}