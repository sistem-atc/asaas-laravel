<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;

final class DigitableBillLineResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $identificationField,
        public readonly ?string $nossoNumero,
        public readonly ?string $barCode,
    ) {}
}