<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\Fine;
use SistemAtc\Asaas\DTO\Shared\Webhook\Split;
use SistemAtc\Asaas\DTO\Shared\Response\Discount;
use SistemAtc\Asaas\DTO\Shared\Response\Interest;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Webhook\Chargeback;

class Payment implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $customer = null,
        public readonly ?string $subscription = null,
        public readonly ?string $installment = null,
        public readonly ?string $paymentLink = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $originalDueDate = null,
        public readonly ?float $value = null,
        public readonly ?float $netValue = null,
        public readonly ?float $originalValue = null,
        public readonly ?float $interestValue = null,
        public readonly ?string $nossoNumero = null,
        public readonly ?string $description = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $billingType = null,
        public readonly ?string $status = null,
        public readonly ?string $pixTransaction = null,
        public readonly ?string $confirmedDate = null,
        public readonly ?string $paymentDate = null,
        public readonly ?string $clientPaymentDate = null,
        public readonly ?string $installmentNumber = null,
        public readonly ?string $creditDate = null,
        public readonly ?string $custody = null,
        public readonly ?string $estimatedCreditDate = null,
        public readonly ?string $invoiceUrl = null,
        public readonly ?string $bankSlipUrl = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?string $invoiceNumber = null,
        public readonly ?bool $deleted = null,
        public readonly ?bool $anticipated = null,
        public readonly ?bool $anticipable = null,
        public readonly ?string $lastInvoiceViewedDate = null,
        public readonly ?string $lastBankSlipViewedDate = null,
        public readonly ?bool $postalService = null,
        public readonly ?CreditCard $creditCard = null,
        public readonly ?Discount $discount = null,
        public readonly ?Fine $fine = null,
        public readonly ?Interest $interest = null,
        #[ArrayOf(Split::class)] public readonly ?array $split = null,
        public readonly ?Chargeback $chargeback = null,
        public readonly ?string $refunds = null,
    ) {}
}