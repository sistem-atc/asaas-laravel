<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Enum\StatusSplit;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\CancelationPayment;

class Split implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $walletId = null,
        public readonly ?float $fixedValue = null,
        public readonly ?float $percentualValue = null,
        public readonly ?float $totalValue = null,
        public readonly ?CancelationPayment $cancellationReason = null,
        public readonly ?StatusSplit $status = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $description = null,
        public readonly ?int $installmentNumber = null,
        ) {}
}