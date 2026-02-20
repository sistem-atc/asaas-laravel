<?php

namespace SistemAtc\Asaas\DTO\Request\Finance;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\BillingTypeEscrow;
use SistemAtc\Asaas\Enum\StatusFinance;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class CollectionStatisticsRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $customer = null,
        public readonly ?BillingTypeEscrow $billingType = null,
        public readonly ?StatusFinance $status = null,
        public readonly ?bool $anticipated = null,
        public readonly ?string $dateCreated__ge = null,
        public readonly ?string $dateCreated__le = null,
        public readonly ?string $dueDate__ge = null,
        public readonly ?string $dueDate__le = null,
        public readonly ?string $estimatedCreditDate__ge = null,
        public readonly ?string $estimatedCreditDate_le = null,
        public readonly ?string $externalReference = null,
    ) {}
}