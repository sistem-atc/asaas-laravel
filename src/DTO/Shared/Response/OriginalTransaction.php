<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class OriginalTransaction implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $endToEndIdentifier = null,
        public readonly ?float $value = null,
        public readonly ?string $effectiveDate = null,
    ) {}
}