<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Callback implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly string $successUrl = null,
        public readonly ?bool $autoRedirect = null,
    ) {}
}
