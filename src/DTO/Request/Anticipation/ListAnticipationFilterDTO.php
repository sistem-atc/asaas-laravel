<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\StatusReceivable;
use SistemAtc\Asaas\Contracts\DTOInterface;

class ListAnticipationFilterDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?StatusReceivable $status = null,
    ) {}
}