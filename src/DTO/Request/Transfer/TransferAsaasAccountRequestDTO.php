<?php

namespace SistemAtc\Asaas\DTO\Request\Transfer;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class TransferAsaasAccountRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly float $value,
        public readonly string $walletId,
        public readonly ?string $externalReference = null,
    ) {}
}