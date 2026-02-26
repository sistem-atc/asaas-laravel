<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentLink;

use SistemAtc\Asaas\Enum\ChargeType;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Enum\CycleSubscription;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class PaymentLinkResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?float $value = null,
        public readonly ?bool $active = null,
        public readonly ?ChargeType $chargeType = null,
        public readonly ?string $url = null,
        public readonly ?BillingType $billingType = null,
        public readonly ?CycleSubscription $subscriptionCycle = null,
        public readonly ?string $description = null,
        public readonly ?string $endDate = null,
        public readonly ?bool $deleted = null,
        public readonly ?int $viewCount = null,
        public readonly ?int $maxInstallmentCount = null,
        public readonly ?int $dueDateLimitDays = null,
        public readonly ?bool $notificationEnabled = null,
        public readonly ?bool $isAddressRequired = null,
        public readonly ?string $externalReference = null,
    ) {}
}