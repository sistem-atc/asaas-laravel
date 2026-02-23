<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\DisabledReason;
use SistemAtc\Asaas\Enum\StatusSplitSubscription;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Split implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $walletId = null,
        public readonly ?float $fixedValue = null,
        public readonly ?float $percentualValue = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $description = null,
        public readonly ?StatusSplitSubscription $status = null,
        public readonly ?DisabledReason $disabledReason = null,
    ) {}
}
