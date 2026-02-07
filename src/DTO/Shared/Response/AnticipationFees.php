<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?AnticipationCreditCardFees $creditCard,
        public readonly ?AnticipationBankSlipFees $bankSlip,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCard: isset($data['creditCard']) ? ($data['creditCard'] instanceof AnticipationCreditCardFees ? $data['creditCard'] : AnticipationCreditCardFees::fromArray($data['creditCard'])) : null,
            bankSlip: isset($data['bankSlip']) ? ($data['bankSlip'] instanceof AnticipationBankSlipFees ? $data['bankSlip'] : AnticipationBankSlipFees::fromArray($data['bankSlip'])) : null,
        );
    }
}