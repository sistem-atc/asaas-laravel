<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDunning;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Enum\StatusFinance;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Enum\BillingTypeEscrow;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\DunningSimulate;

final class ListPaymentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $payment = null,
        public readonly ?string $customer = null,
        public readonly ?float $value = null,
        public readonly ?StatusFinance $status = null,
        public readonly ?BillingTypeEscrow $billingType = null,
        public readonly ?string $dueDate = null,
        #[ArrayOf(DunningSimulate::class)] public readonly ?array $typeSimulations = null,
    ) {}
}