<?php

namespace SistemAtc\Asaas\DTO\Response\Checkout;

use SistemAtc\Asaas\Enum\ChargeType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\BillingTypeCheckout;
use SistemAtc\Asaas\DTO\Shared\Common\Callback;
use SistemAtc\Asaas\DTO\Shared\Common\Customer;
use SistemAtc\Asaas\DTO\Shared\Common\Installment;
use SistemAtc\Asaas\DTO\Shared\Common\Subscription;
use SistemAtc\Asaas\DTO\Shared\Request\ItemCheckout;
use SistemAtc\Asaas\DTO\Shared\Common\SplitCheckout;

final class CheckoutResponseDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        /** @var BillingTypeCheckout[] */ public readonly ?array $billingTypes = null,
        /** @var ChargeType[] */ public readonly ?array $chargeTypes = null,
        public readonly ?int $minutesToExpire = null,
        public readonly ?string $externalReference = null,
        public readonly ?Callback $callback = null,
        #[CastToArray(ItemCheckout::class)] public readonly ?array $items = null,
        public readonly ?Customer $customerData = null,
        public readonly ?Subscription $subscription = null,
        public readonly ?Installment $installment = null,
        #[CastToArray(SplitCheckout::class)] public readonly ?array $splits = null,
    ) {}
}