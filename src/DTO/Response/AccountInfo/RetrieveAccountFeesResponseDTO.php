<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\FeeValue;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentFees;
use SistemAtc\Asaas\DTO\Shared\Response\TransferFees;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationFees;
use SistemAtc\Asaas\DTO\Shared\Response\NotificationFees;
use SistemAtc\Asaas\DTO\Shared\Response\CreditBureauReportFees;

final class RetrieveAccountFeesResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?PaymentFees $payment = null,
        public readonly ?TransferFees $transfer = null,
        public readonly ?NotificationFees $notification = null,
        public readonly ?CreditBureauReportFees $creditBureauReport = null,
        public readonly ?FeeValue $paymentDunning = null,
        public readonly ?FeeValue $invoice = null,
        public readonly ?AnticipationFees $anticipation = null,
    ) {}
}