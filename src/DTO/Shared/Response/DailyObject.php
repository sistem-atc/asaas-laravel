<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class DailyObject implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $limit = null,
        public readonly ?float $used = null,
        public readonly ?bool $wasReached = null,
    ) {}
}