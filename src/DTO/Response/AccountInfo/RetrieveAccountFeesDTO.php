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

class RetrieveAccountFeesDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?PaymentFees $payment,
        public readonly ?TransferFees $transfer,
        public readonly ?NotificationFees $notification,
        public readonly ?CreditBureauReportFees $creditBureauReport,
        public readonly ?FeeValue $paymentDunning,
        public readonly ?FeeValue $invoice,
        public readonly ?AnticipationFees $anticipation,
    ) {}
}