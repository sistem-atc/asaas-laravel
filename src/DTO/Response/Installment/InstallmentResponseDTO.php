<?php

namespace SistemAtc\Asaas\DTO\Response\Installment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Enum\BillingTypeList;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Response\PaymentRefunds;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackResponseDTO;

final class InstallmentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?float $value = null,
        public readonly ?float $netValue = null,
        public readonly ?float $paymentValue = null,
        public readonly ?int $installmentCount = null,
        public readonly ?BillingTypeList $billingType = null,
        public readonly ?string $paymentDate = null,
        public readonly ?string $description = null,
        public readonly ?int $expirationDay = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $customer = null,
        public readonly ?string $paymentLink = null,
        public readonly ?string $checkoutSession = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?ChargebackResponseDTO $chargeback = null,
        public readonly ?CreditCard $creditCard = null,
        public readonly ?bool $deleted = null,
        #[ArrayOf(PaymentRefunds::class)] public readonly ?array $refunds = null,
    ) {}
}