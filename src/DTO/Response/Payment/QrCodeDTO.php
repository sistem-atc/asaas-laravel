<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use Carbon\Carbon;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;

class QrCodeDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $encodedImage,
        public readonly ?string $payload,
        public readonly ?Carbon $expirationDate,
        public readonly ?string $description,
    ) {}
}