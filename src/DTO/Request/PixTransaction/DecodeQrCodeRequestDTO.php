<?php

namespace SistemAtc\Asaas\DTO\Request\PixTransaction;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class DecodeQrCodeRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $payload,
        public readonly ?float $changeValue = null,
        public readonly ?string $expectedPaymentDate = null,
    ) {}
}