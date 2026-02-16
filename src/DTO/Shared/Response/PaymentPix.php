<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class PaymentPix implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $encodedImage = null,
        public readonly ?string $payload = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $description = null,
    ) {}
}