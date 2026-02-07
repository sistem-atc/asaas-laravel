<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusAnticipation;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveAnticipationDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $installment,
        public readonly ?string $payment,
        public readonly ?StatusAnticipation $status,
        public readonly ?string $anticipationDate,
        public readonly ?string $dueDate,
        public readonly ?string $requestDate,
        public readonly ?float $fee,
        public readonly ?int $anticipationDays,
        public readonly ?float $netValue,
        public readonly ?float $totalValue,
        public readonly ?float $value,
        public readonly ?string $denialObservation,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            installment: $data['installment'] ?? null,
            payment: $data['payment'] ?? null,
            status: isset($data['status']) ? StatusAnticipation::tryFrom($data['status']) : null,
            anticipationDate: $data['anticipationDate'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            requestDate: $data['requestDate'] ?? null,
            fee: isset($data['fee']) ? (float) $data['fee'] : null,
            anticipationDays: $data['anticipationDays'] ?? null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            totalValue: isset($data['totalValue']) ? (float) $data['totalValue'] : null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            denialObservation: $data['denialObservation'] ?? null,
        );
    }
}