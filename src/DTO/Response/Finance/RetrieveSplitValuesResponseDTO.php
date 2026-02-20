<?php

namespace SistemAtc\Asaas\DTO\Response\Finance;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class RetrieveSplitValuesResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $income = null,
        public readonly ?float $value = null,
    ) {}
}