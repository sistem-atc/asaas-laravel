<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class PixTransferFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $feeValue = null,
        public readonly ?float $discountValue = null,
        public readonly ?string $expirationDate = null,
        public readonly ?bool $consideredInMonthlyTransfersWithoutFee = null,
    ) {}
}