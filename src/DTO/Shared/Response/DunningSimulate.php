<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\DunningType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class DunningSimulate implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?DunningType $type = null,
        public readonly ?bool $isAllowed = null,
        public readonly ?string $notAllowedReason = null,
        public readonly ?float $feeValue = null,
        public readonly ?float $netValue = null,
        public readonly ?string $startDate = null,
    ) {}
}