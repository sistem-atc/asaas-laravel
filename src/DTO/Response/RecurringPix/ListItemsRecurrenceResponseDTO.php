<?php

namespace SistemAtc\Asaas\DTO\Response\RecurringPix;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\RecurrenceItems;

class ListItemsRecurrenceResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        #[ArrayOf(RecurrenceItems::class)] public readonly ?array $data = null,
    ) {}
}