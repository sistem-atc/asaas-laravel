<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationBankSlipFees implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $monthlyFeePercentage = null,
    ) {}
}