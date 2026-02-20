<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class RemoveDocumentsResponseDTO implements DTOInterface
{
    
    use CastToArray, AutoHydrate;

    public function __construct(
        public ?bool $deleted = null,
        public ?string $id = null,
    ) {}
}