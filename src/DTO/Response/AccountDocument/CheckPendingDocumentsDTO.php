<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\PendingDocument;
use SistemAtc\Asaas\Traits\AutoHydrate;

class CheckPendingDocumentsDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    /**
     * @param PendingDocument[]|null $data
     */
    public function __construct(
        public readonly ?string $rejectReasons = null,
        public readonly ?PendingDocument $data = null,
    ) {}
}