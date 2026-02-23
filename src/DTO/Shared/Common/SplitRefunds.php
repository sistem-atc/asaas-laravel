<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class SplitRefunds implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $id,
        public readonly float $value,
    ) {}
}