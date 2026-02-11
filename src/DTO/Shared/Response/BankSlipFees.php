<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class BankSlipFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $defaultValue = null,
        public readonly ?float $discountValue = null,
        public readonly ?string $expirationDate = null,
        public readonly ?int $daysToReceive = null,
    ) {}
}