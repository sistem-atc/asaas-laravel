<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentLink;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Enum\ChargeType;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;

final class PaymentLinkRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $endDate = null,
        public readonly ?float $value = null,
        public readonly BillingType $billingType,
        public readonly ChargeType $chargeType,
        public readonly ?int $dueDateLimitDays = null,
        public readonly ?CycleSubscription $subscriptionCycle = null,
        public readonly ?int $maxInstallmentCount = null,
        public readonly ?string $externalReference = null,
        public readonly ?bool $notificationEnabled = true,
        public readonly ?Callback $callback = null,
        public readonly ?bool $isAddressRequired = null,
    ) {}
}
