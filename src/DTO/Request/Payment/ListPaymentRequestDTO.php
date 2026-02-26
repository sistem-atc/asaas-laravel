<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Enum\InvoiceStatus;
use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListPaymentRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $customer = null,
        public readonly ?string $customerGroupName = null,
        public readonly ?BillingType $billingType = null,
        public readonly ?StatusPayment $status = null,
        public readonly ?string $subscription = null,
        public readonly ?string $installment = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $paymentDate = null,
        public readonly ?InvoiceStatus $invoiceStatus = null,
        public readonly ?string $estimatedCreditDate = null,
        public readonly ?string $pixQrCodeId = null,
        public readonly ?bool $anticipated = null,
        public readonly ?bool $anticipable = null,
        public readonly ?string $dateCreated__ge = null,
        public readonly ?string $dateCreated__le = null,
        public readonly ?string $paymentDate__ge = null,
        public readonly ?string $paymentDate__le = null,
        public readonly ?string $estimatedCreditDate__ge = null,
        public readonly ?string $estimatedCreditDate__le = null,
        public readonly ?string $dueDate__ge = null,
        public readonly ?string $dueDate__le = null,
        public readonly ?string $user = null,
        public readonly ?string $checkoutSession = null,
    ) {}
}