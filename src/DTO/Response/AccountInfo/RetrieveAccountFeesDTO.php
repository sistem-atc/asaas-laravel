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

class RetrieveAccountFeesDTO implements DTOInterface
{
    public function __construct(
        public readonly ?PaymentFees $payment,
        public readonly ?TransferFees $transfer,
        public readonly ?NotificationFees $notification,
        public readonly ?CreditBureauReportFees $creditBureauReport,
        public readonly ?PaymentDunningFees $paymentDunning,
        public readonly ?InvoiceFees $invoice,
        public readonly ?AnticipationFees $anticipation,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            payment: isset($data['payment']) ? PaymentFees::fromArray($data['payment']) : null,
            transfer: isset($data['transfer']) ? TransferFees::fromArray($data['transfer']) : null,
            notification: isset($data['notification']) ? NotificationFees::fromArray($data['notification']) : null,
            creditBureauReport: isset($data['creditBureauReport']) ? CreditBureauReportFees::fromArray($data['creditBureauReport']) : null,
            paymentDunning: isset($data['paymentDunning']) ? PaymentDunningFees::fromArray($data['paymentDunning']) : null,
            invoice: isset($data['invoice']) ? InvoiceFees::fromArray($data['invoice']) : null,
            anticipation: isset($data['anticipation']) ? AnticipationFees::fromArray($data['anticipation']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'payment'            => $this->payment?->toArray(),
            'transfer'           => $this->transfer?->toArray(),
            'notification'       => $this->notification?->toArray(),
            'creditBureauReport' => $this->creditBureauReport?->toArray(),
            'paymentDunning'     => $this->paymentDunning?->toArray(),
            'invoice'            => $this->invoice?->toArray(),
            'anticipation'       => $this->anticipation?->toArray(),
        ], fn($v) => !is_null($v));
    }
}