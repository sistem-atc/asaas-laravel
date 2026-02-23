<?php

namespace SistemAtc\Asaas\DTO\Response\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class QRCodeStaticResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $encodedImage = null,
        public readonly ?string $payload = null,
        public readonly ?bool $allowsMultiplePayments = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $externalReference = null,
        public readonly ?string $description = null,
    ) {}
}