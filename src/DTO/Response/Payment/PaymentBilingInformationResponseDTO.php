<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentPix;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentBankSplit;

final class PaymentBilingInformationResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?PaymentPix $pix = null,
        public readonly ?CreditCard $creditCard = null,
        public readonly ?PaymentBankSplit $bankSlip = null,
    ) {}
}
