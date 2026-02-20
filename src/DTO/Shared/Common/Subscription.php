<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Subscription implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?CycleSubscription $cycle = null,
        public readonly ?string $endDate = null,
        public readonly ?string $nextDueDate = null,
    ) {}
}