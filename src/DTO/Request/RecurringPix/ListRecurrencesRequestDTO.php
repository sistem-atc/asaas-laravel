<?php

namespace SistemAtc\Asaas\DTO\Request\RecurringPix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusRecurrencesPix;

class ListRecurrencesRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?StatusRecurrencesPix $status = null,
        public readonly ?float $value = null,
        public readonly ?string $searchText = null,
    ) {}
}