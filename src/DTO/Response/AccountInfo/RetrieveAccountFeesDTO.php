<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\InvoiceFees;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentFees;
use SistemAtc\Asaas\DTO\Shared\Response\TransferFees;
use SistemAtc\Asaas\DTO\Shared\Response\AnticipationFees;
use SistemAtc\Asaas\DTO\Shared\Response\NotificationFees;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentDunningFees;
use SistemAtc\Asaas\DTO\Shared\Response\CreditBureauReportFees;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveAccountFeesDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?PaymentFees $payment,
        public readonly ?TransferFees $transfer,
        public readonly ?NotificationFees $notification,
        public readonly ?CreditBureauReportFees $creditBureauReport,
        public readonly ?PaymentDunningFees $paymentDunning,
        public readonly ?InvoiceFees $invoice,
        public readonly ?AnticipationFees $anticipation,
    ) {}
}