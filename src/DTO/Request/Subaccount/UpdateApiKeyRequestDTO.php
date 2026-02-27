<?php

namespace SistemAtc\Asaas\DTO\Request\Subaccount;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class UpdateApiKeyRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $name,
        public readonly bool $enabled,
        public readonly string $expirationDate,
    ) {}
}