<?php

namespace SistemAtc\Asaas\DTO\Response\Finance;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class CollectionStatisticsResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $quantity = null,
        public readonly ?float $value = null,
        public readonly ?float $netValue = null,
    ) {}
}