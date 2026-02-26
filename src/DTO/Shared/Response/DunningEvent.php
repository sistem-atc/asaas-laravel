<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\StatusEvents;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class DunningEvent implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?StatusEvents $status = null,
        public readonly ?string $description = null,
        public readonly ?string $eventDate = null,
    ) {}
}