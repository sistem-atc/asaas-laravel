<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AnticipationBankSlipFees implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $monthlyFeePercentage = null,
    ) {}
}