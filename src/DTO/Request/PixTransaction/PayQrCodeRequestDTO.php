<?php

namespace SistemAtc\Asaas\DTO\Request\PixTransaction;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\QrCode;

class PayQrCodeRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly QrCode $qrCode,
        public readonly float $value,
        public readonly ?string $description = null,
        public readonly ?string $scheduleDate = null,
    ) {}
}