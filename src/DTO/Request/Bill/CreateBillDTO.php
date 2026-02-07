<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;
use DateTimeInterface;

class CreateBillDTO implements DTOInterface
{
    use CastToArray;

    public function __construct(
        public readonly string $identificationField,
        public readonly ?DateTimeInterface $scheduleDate,
        public readonly ?float $value,
        public readonly ?string $description,
        public readonly ?float $discount,
        public readonly ?float $interest,
        public readonly ?float $fine,
        public readonly ?DateTimeInterface $dueDate,
        public readonly ?string $externalReference,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            identificationField: $data['identificationField'],
            scheduleDate: isset($data['scheduleDate']) ? new \DateTime($data['scheduleDate']) : null,
            value: isset($data['value']) ? (float) $data['value'] : 0,
            description: $data['description'] ?? null,
            discount: isset($data['discount']) ? (float) $data['discount'] : 0,
            interest: isset($data['interest']) ? (float) $data['interest'] : 0,
            fine: isset($data['fine']) ? (float) $data['fine'] : 0,
            dueDate: isset($data['dueDate']) ? new \DateTime($data['dueDate']) : null,
            externalReference: $data['externalReference'] ?? null,
        );
    }
}