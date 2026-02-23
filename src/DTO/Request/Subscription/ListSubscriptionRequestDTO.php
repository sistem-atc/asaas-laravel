<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BillingTypeEscrow;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusSubscription;

final class ListSubscriptionRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $customer,
        public readonly ?string $customerGroupName,
        public readonly ?BillingTypeEscrow $billingType,
        public readonly ?StatusSubscription $status,
        public readonly ?string $deletedOnly,
        public readonly ?string $includeDeleted,
        public readonly ?string $externalReference,
        public readonly ?string $order,
        public readonly ?string $sort,
    ) {}
}