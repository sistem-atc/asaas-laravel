<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class QrCodeResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?bool $success = null,
        public readonly ?string $encodedImage = null,
        public readonly ?string $payload = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $description = null,
    ) {}
}