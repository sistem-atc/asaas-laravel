<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationBankSlip;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationCreditCard;

class RetrieveAntecipationLimitsDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?AnticipationCreditCard $creditCard,
        public readonly ?AnticipationBankSlip $bankSlip,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCard: isset($data['creditCard']) ? AnticipationCreditCard::fromArray($data['creditCard']) : null,
            bankSlip: isset($data['bankSlip']) ? AnticipationBankSlip::fromArray($data['bankSlip']) : null,
        );
    }
}