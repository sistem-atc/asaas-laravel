<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class QRCodeStaticDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id,
        public readonly ?string $encodedImage,
        public readonly ?string $payload,
        public readonly ?bool $allowsMultiplePayments,
        public readonly ?string $expirationDate,
        public readonly ?string $externalReference,
        public readonly ?string $description,
    ) {}
}