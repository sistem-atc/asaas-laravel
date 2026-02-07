<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class SimulateAnticipationDTO implements DTOInterface
{

    use CastToArray;
    
    public function __construct(
        public readonly ?string $installment,
        public readonly ?string $payment,
        public readonly ?string $anticipationDate,
        public readonly ?string $dueDate,
        public readonly ?float $fee,
        public readonly ?int $anticipationDays,
        public readonly ?float $netValue,
        public readonly ?float $totalValue,
        public readonly ?float $value,
        public readonly ?bool $isDocumentationRequired,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            installment: $data['installment'] ?? null,
            payment: $data['payment'] ?? null,
            anticipationDate: $data['anticipationDate'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            fee: isset($data['fee']) ? (float) $data['fee'] : null,
            anticipationDays: $data['anticipationDays'] ?? null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            totalValue: isset($data['totalValue']) ? (float) $data['totalValue'] : null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            isDocumentationRequired: $data['isDocumentationRequired'] ?? null,
        );
    }

}