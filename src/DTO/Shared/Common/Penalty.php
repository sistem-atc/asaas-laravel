<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\DiscountType;

class Penalty implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $value = null,
        public readonly ?int $dueDateLimitDays = null,
        public readonly ?string $limitedDate = null,
        public readonly ?DiscountType $type = null,
    ) {}
}