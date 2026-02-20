<?php

namespace SistemAtc\Asaas\DTO\Response\Chargeback;

use SistemAtc\Asaas\Enum\DisputeStatus;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ChargebackDisputeResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $chargebackId = null,
        public readonly ?DisputeStatus $status = null,
        public readonly ?array $files = null,
    ) {}
}