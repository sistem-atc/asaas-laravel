<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class PaymentFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?BankSlipFees $bankSlip,
        public readonly ?CreditCardFees $creditCard,
        public readonly ?DebitCardFees $debitCard,
        public readonly ?PixFees $pix,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            bankSlip: isset($data['bankSlip']) ? BankSlipFees::fromArray($data['bankSlip']) : null,
            creditCard: isset($data['creditCard']) ? CreditCardFees::fromArray($data['creditCard']) : null,
            debitCard: isset($data['debitCard']) ? DebitCardFees::fromArray($data['debitCard']) : null,
            pix: isset($data['pix']) ? PixFees::fromArray($data['pix']) : null,
        );
    }
}