<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\CreditCard;
use SistemAtc\Asaas\Traits\CastToArray;

class PaymentDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $customer,
        public readonly ?string $checkoutSession,
        public readonly ?string $paymentLink,
        public readonly ?float $value,
        public readonly ?float $netValue,
        public readonly ?float $originalValue,
        public readonly ?float $interestValue,
        public readonly ?string $description,
        public readonly ?BillingType $billingType,
        public readonly ?string $confirmedDate,
        public readonly ?CreditCard $creditCard,
        public readonly ?string $pixTransaction,
        public readonly ?string $status,
        public readonly ?string $dueDate,
        public readonly ?string $originalDueDate,
        public readonly ?string $paymentDate,
        public readonly ?string $clientPaymentDate,
        public readonly ?int $installmentNumber,
        public readonly ?string $invoiceUrl,
        public readonly ?string $invoiceNumber,
        public readonly ?string $externalReference,
        public readonly bool $deleted,
        public readonly bool $anticipated,
        public readonly bool $anticipable,
        public readonly ?string $creditDate,
        public readonly ?string $estimatedCreditDate,
        public readonly ?string $transactionReceiptUrl,
        public readonly ?string $nossoNumero,
        public readonly ?string $bankSlipUrl,
        public readonly ?string $lastInvoiceViewedDate,
        public readonly ?string $lastBankSlipViewedDate,
        public readonly bool $postalService,
        public readonly ?string $escrow,
        public readonly ?array $refunds,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            dateCreated: $data['dateCreated'] ?? null,
            customer: $data['customer'] ?? null,
            checkoutSession: $data['checkoutSession'] ?? null,
            paymentLink: $data['paymentLink'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            netValue: isset($data['netValue']) ? (float) $data['netValue'] : null,
            originalValue: isset($data['originalValue']) ? (float) $data['originalValue'] : null,
            interestValue: isset($data['interestValue']) ? (float) $data['interestValue'] : null,
            description: $data['description'] ?? null,
            billingType: isset($data['billingType']) ? (is_string($data['billingType']) ? BillingType::from($data['billingType']) : $data['billingType']) : null,
            confirmedDate: $data['confirmedDate'] ?? null,
            creditCard: isset($data['creditCard']) ? CreditCard::fromArray($data['creditCard']) : null,
            pixTransaction: $data['pixTransaction'] ?? null,
            status: $data['status'] ?? null,
            dueDate: $data['dueDate'] ?? null,
            originalDueDate: $data['originalDueDate'] ?? null,
            paymentDate: $data['paymentDate'] ?? null,
            clientPaymentDate: $data['clientPaymentDate'] ?? null,
            installmentNumber: $data['installmentNumber'] ?? null,
            invoiceUrl: $data['invoiceUrl'] ?? null,
            invoiceNumber: $data['invoiceNumber'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            deleted: $data['deleted'] ?? false,
            anticipated: $data['anticipated'] ?? false,
            anticipable: $data['anticipable'] ?? false,
            creditDate: $data['creditDate'] ?? null,
            estimatedCreditDate: $data['estimatedCreditDate'] ?? null,
            transactionReceiptUrl: $data['transactionReceiptUrl'] ?? null,
            nossoNumero: $data['nossoNumero'] ?? null,
            bankSlipUrl: $data['bankSlipUrl'] ?? null,
            lastInvoiceViewedDate: $data['lastInvoiceViewedDate'] ?? null,
            lastBankSlipViewedDate: $data['lastBankSlipViewedDate'] ?? null,
            postalService: $data['postalService'] ?? false,
            escrow: $data['escrow'] ?? null,
            refunds: $data['refunds'] ?? null,
        );
    }
}
