<?php

namespace SistemAtc\Asaas\DTO\Request\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\FormatQrCode;

final class CreateQRCodeStaticRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $addressKey = null,
        public readonly ?string $description = null,
        public readonly ?float $value = null,
        public readonly ?FormatQrCode $format = null,
        public readonly ?float $expirationDate = null,
        public readonly ?int $expirationSeconds = null,
        public readonly ?bool $allowsMultiplePayments = null,
        public readonly ?string $externalReference = null,
    ) {}
}