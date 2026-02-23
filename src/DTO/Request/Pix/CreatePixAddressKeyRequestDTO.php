<?php

namespace SistemAtc\Asaas\DTO\Request\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\PixAddressKeyType;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreatePixAddressKeyRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly PixAddressKeyType $type,
    ) {}
}