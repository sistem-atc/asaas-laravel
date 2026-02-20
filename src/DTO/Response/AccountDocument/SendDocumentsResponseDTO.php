<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class SendDocumentsResponseDTO implements DTOInterface
{
    
    use CastToArray, AutoHydrate;

    public function __construct(
        public ?string $id = null,
        public ?StatusDocument $status = null,
    ) {}
}