<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationBankSlip;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationCreditCard;

final class RetrieveAnticipationLimitsResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?AnticipationCreditCard $creditCard = null,
        public readonly ?AnticipationBankSlip $bankSlip = null,
    ) {}
}