<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\PixAddressKeyType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class ExternalAccount implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $ispb = null,
        public readonly ?string $ispbName = null,
        public readonly ?string $name = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $addressKey = null,
        public readonly ?PixAddressKeyType $addressKeyType = null,
    ) {}
}