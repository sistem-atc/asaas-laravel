<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;

class PaymentDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

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
        public readonly ?bool $deleted,
        public readonly ?bool $anticipated,
        public readonly ?bool $anticipable,
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
}
