<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusAnticipation;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class RetrieveAnticipationResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $installment = null,
        public readonly ?string $payment = null,
        public readonly ?StatusAnticipation $status = null,
        public readonly ?string $anticipationDate = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $requestDate = null,
        public readonly ?float $fee = null,
        public readonly ?int $anticipationDays = null,
        public readonly ?float $netValue = null,
        public readonly ?float $totalValue = null,
        public readonly ?float $value = null,
        public readonly ?string $denialObservation = null,
    ) {}
}