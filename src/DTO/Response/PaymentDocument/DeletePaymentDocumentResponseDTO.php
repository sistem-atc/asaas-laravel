<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDocument;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class DeletePaymentDocumentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?bool $deleted,
        public readonly ?string $id,
    ) {}
}