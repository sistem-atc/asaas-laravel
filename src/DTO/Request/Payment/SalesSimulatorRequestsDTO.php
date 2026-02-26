<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class SalesSimulatorRequestsDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly float $value,
        public readonly ?int $installmentCount = null,
        /** @var \SistemAtc\Asaas\Enum\BillingTypeSimulate[] */ public readonly array $billingTypes,
    ) {}
}