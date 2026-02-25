<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDocument;

use SistemAtc\Asaas\Enum\DocumentType;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\FileDocument;

final class PaymentDocumentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?DocumentType $type,
        public readonly ?bool $availableAfterPayment,
        public readonly ?FileDocument $file,
        public readonly ?bool $deleted,
    ) {}
}