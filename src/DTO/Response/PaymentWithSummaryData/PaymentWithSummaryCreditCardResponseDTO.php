<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData;

use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;
use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BillingTypeEscrow;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\Fine;
use SistemAtc\Asaas\DTO\Shared\Response\Discount;
use SistemAtc\Asaas\DTO\Shared\Response\Interest;

final class PaymentWithSummaryCreditCardResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $customerId = null,
        public readonly ?string $subscriptionId = null,
        public readonly ?string $installmentId = null,
        public readonly ?string $paymentLinkId = null,
        public readonly ?float $value = null,
        public readonly ?float $netValue = null,
        public readonly ?float $originalValue = null,
        public readonly ?float $interestValue = null,
        public readonly ?string $description = null,
        public readonly ?BillingTypeEscrow $billingType = null,
        public readonly ?bool $canBePaidAfterDueDate = null,
        public readonly ?string $confirmedDate = null,
        public readonly ?string $pixTransactionId = null,
        public readonly ?StatusPayment $status = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $originalDueDate = null,
        public readonly ?string $paymentDate = null,
        public readonly ?string $customerPaymentDate = null,
        public readonly ?int $installmentNumber = null,
        public readonly ?string $externalReference = null,
        public readonly ?bool $deleted = null,
        public readonly ?bool $anticipated = null,
        public readonly ?bool $anticipable = null,
        public readonly ?string $creditDate = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?string $duplicatedPaymentId = null,
        public readonly ?Discount $discount = null,
        public readonly ?Fine $fine = null,
        public readonly ?Interest $interest = null,
        public readonly ?bool $postalService = null,
        public readonly ?CreditCard $creditCard = null,
    ) {}
}