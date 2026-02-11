<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\AnticipationStatus;

class ListAnticipationFilterDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?AnticipationStatus $status = null,
    ) {}
}