<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class PaymentFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?BankSlipFees $bankSlip = null,
        public readonly ?CreditCardFees $creditCard = null,
        public readonly ?DebitCardFees $debitCard = null,
        public readonly ?PixFees $pix = null,
    ) {}
}