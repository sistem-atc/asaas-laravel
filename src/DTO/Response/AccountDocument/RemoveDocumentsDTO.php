<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class RemoveDocumentsDTO implements DTOInterface
{
    
    use CastToArray, AutoHydrate;

    public function __construct(
        public bool $deleted,
        public ?string $id,
    ) {}
}