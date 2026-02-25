<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;

final class DeletePaymentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?bool $deleted,
        public readonly ?string $id,
    ) {}
}