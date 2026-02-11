<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class SimulateAnticipationDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
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
}