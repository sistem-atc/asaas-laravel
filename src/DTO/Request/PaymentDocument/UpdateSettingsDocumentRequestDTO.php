<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDocument;

use SistemAtc\Asaas\Enum\DocumentType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class UpdateSettingsDocumentRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly bool $availableAfterPayment,
        public readonly DocumentType $type,
    ) {}
}
