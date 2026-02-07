<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Invoice implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $status,
        public readonly ?string $customer,
        public readonly ?string $type,
        public readonly ?string $statusDescription,
        public readonly ?string $serviceDescription,
        public readonly ?string $pdfUrl,
        public readonly ?string $xmlUrl,
        public readonly ?string $rpsSerie,
        public readonly ?string $rpsNumber,
        public readonly ?string $number,
        public readonly ?string $validationCode,
        public readonly ?float $value,
        public readonly ?float $deductions,
        public readonly ?string $effectiveDate,
        public readonly ?string $observations,
        public readonly ?string $estimatedTaxesDescription,
        public readonly ?string $payment,
        public readonly ?string $installment,
        public readonly ?Taxes $taxes,
        public readonly ?string $municipalServiceCode,
        public readonly ?string $municipalServiceName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            status: $data['status'] ?? null,
            customer: $data['customer'] ?? null,
            type: $data['type'] ?? null,
            statusDescription: $data['statusDescription'] ?? null,
            serviceDescription: $data['serviceDescription'] ?? null,
            pdfUrl: $data['pdfUrl'] ?? null,
            xmlUrl: $data['xmlUrl'] ?? null,
            rpsSerie: $data['rpsSerie'] ?? null,
            rpsNumber: $data['rpsNumber'] ?? null,
            number: $data['number'] ?? null,
            validationCode: $data['validationCode'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            deductions: isset($data['deductions']) ? (float) $data['deductions'] : null,
            effectiveDate: $data['effectiveDate'] ?? null,
            observations: $data['observations'] ?? null,
            estimatedTaxesDescription: $data['estimatedTaxesDescription'] ?? null,
            payment: $data['payment'] ?? null,
            installment: $data['installment'] ?? null,
            taxes: isset($data['taxes']) ? Taxes::fromArray($data['taxes']) : null,
            municipalServiceCode: $data['municipalServiceCode'] ?? null,
            municipalServiceName: $data['municipalServiceName'] ?? null,
        );
    }
}