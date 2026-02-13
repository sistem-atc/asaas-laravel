<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BillingTypeList;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Common\Penalty;
use SistemAtc\Asaas\DTO\Shared\Common\Split;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentChargeback;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentEscrow;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentRefunds;

class PaymentDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $customer,
        public readonly ?string $subscription,
        public readonly ?string $installment,
        public readonly ?string $checkoutSession,
        public readonly ?string $paymentLink,
        public readonly ?float $value,
        public readonly ?float $netValue,
        public readonly ?float $originalValue,
        public readonly ?float $interestValue,
        public readonly ?string $description,
        public readonly ?BillingTypeList $billingType,
        public readonly ?CreditCard $creditCard,
        public readonly ?bool $canBePaidAfterDueDate,
        public readonly ?string $pixTransaction,
        public readonly ?string $pixQrCodeId,
        public readonly ?StatusPayment $status,
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
        public readonly ?Penalty $discount,
        public readonly ?Penalty $fine,
        public readonly ?Penalty $interest,
        #[ArrayOf(Split::class)] public readonly ?array $split,
        public readonly ?bool $postalService,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation,
        public readonly ?PaymentChargeback $chargeback,
        public readonly ?PaymentEscrow $escrow,
        #[ArrayOf(PaymentRefunds::class)] public readonly ?array $refunds,
    ) {}
}
