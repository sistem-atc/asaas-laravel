<?php

namespace SistemAtc\Asaas\DTO\Request\AutomaticPix;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\ImmediateQrCode;
use SistemAtc\Asaas\Enum\Frequency;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class CreateAuthorizationRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly Frequency $frequency,
        public readonly string $contractId,
        public readonly string $startDate,
        public readonly ?string $finishDate = null,
        public readonly ?float $value = null,
        public readonly ?string $description = null,
        public readonly string $customerId,
        public readonly ImmediateQrCode $immediateQrCode,
        public readonly ?int $minLimitValue = null,
    ) {}
}