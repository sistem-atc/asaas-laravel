<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Webhook\Fine;
use SistemAtc\Asaas\DTO\Shared\Webhook\Split;
use SistemAtc\Asaas\DTO\Shared\Webhook\Discount;
use SistemAtc\Asaas\DTO\Shared\Webhook\Interest;
use SistemAtc\Asaas\DTO\Shared\Webhook\Chargeback;
use SistemAtc\Asaas\DTO\Shared\Webhook\CreditCard;
use SistemAtc\Asaas\Traits\CastToArray;

class Payment implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $customer,
        public readonly ?string $subscription,
        public readonly ?string $installment,
        public readonly ?string $paymentLink,
        public readonly ?string $dueDate,
        public readonly ?string $originalDueDate,
        public readonly ?float $value,
        public readonly ?float $netValue,
        public readonly ?float $originalValue,
        public readonly ?float $interestValue,
        public readonly ?string $nossoNumero,
        public readonly ?string $description,
        public readonly ?string $externalReference,
        public readonly ?string $billingType,
        public readonly ?string $status,
        public readonly ?string $pixTransaction,
        public readonly ?string $confirmedDate,
        public readonly ?string $paymentDate,
        public readonly ?string $clientPaymentDate,
        public readonly ?string $installmentNumber,
        public readonly ?string $creditDate,
        public readonly ?string $custody,
        public readonly ?string $estimatedCreditDate,
        public readonly ?string $invoiceUrl,
        public readonly ?string $bankSlipUrl,
        public readonly ?string $transactionReceiptUrl,
        public readonly ?string $invoiceNumber,
        public readonly ?bool $deleted,
        public readonly ?bool $anticipated,
        public readonly ?bool $anticipable,
        public readonly ?string $lastInvoiceViewedDate,
        public readonly ?string $lastBankSlipViewedDate,
        public readonly ?bool $postalService,
        public readonly ?CreditCard $creditCard,
        public readonly ?Discount $discount,
        public readonly ?Fine $fine,
        public readonly ?Interest $interest,
        public readonly ?array $split,
        public readonly ?Chargeback $chargeback,
        public readonly ?string $refunds,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            dateCreated: $data['dateCreated'] ?? null,
            customer: $data['customer'] ?? null,
            subscription: $data['subscription'] ?? null,
            installment: $data['installment'] ?? null,
            paymentLink: $data['paymentLink'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            originalDueDate: $data['originalDueDate'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            originalValue: isset($data['originalValue']) ? (float) $data['originalValue'] : null,
            interestValue: isset($data['interestValue']) ? (float) $data['interestValue'] : null,
            nossoNumero: $data['nossoNumero'] ?? null,
            description: $data['description'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            billingType: $data['billingType'] ?? null,
            status: $data['status'] ?? null,
            pixTransaction: $data['pixTransaction'] ?? null,
            confirmedDate: $data['confirmedDate'] ?? null,
            paymentDate: $data['paymentDate'] ?? null,
            clientPaymentDate: $data['clientPaymentDate'] ?? null,
            installmentNumber: $data['installmentNumber'] ?? null,
            creditDate: $data['creditDate'] ?? null,
            custody: $data['custody'] ?? null,
            estimatedCreditDate: $data['estimatedCreditDate'] ?? null,
            invoiceUrl: $data['invoiceUrl'] ?? null,
            bankSlipUrl: $data['bankSlipUrl'] ?? null,
            transactionReceiptUrl: $data['transactionReceiptUrl'] ?? null,
            invoiceNumber: $data['invoiceNumber'] ?? null,
            deleted: $data['deleted'] ?? null,
            anticipated: $data['anticipated'] ?? null,
            anticipable: $data['anticipable'] ?? null,
            lastInvoiceViewedDate: $data['lastInvoiceViewedDate'] ?? null,
            lastBankSlipViewedDate: $data['lastBankSlipViewedDate'] ?? null,
            postalService: $data['postalService'] ?? null,
            creditCard: isset($data['creditCard']) ? CreditCard::fromArray($data['creditCard']) : null,
            discount: isset($data['discount']) ? Discount::fromArray($data['discount']) : null,
            fine: isset($data['fine']) ? Fine::fromArray($data['fine']) : null,
            interest: isset($data['interest']) ? Interest::fromArray($data['interest']) : null,
            split: isset($data['split']) ? array_map(fn($s) => Split::fromArray($s), $data['split']) : null,
            chargeback: isset($data['chargeback']) ? Chargeback::fromArray($data['chargeback']) : null,
            refunds: $data['refunds'] ?? null,
        );
    }
}