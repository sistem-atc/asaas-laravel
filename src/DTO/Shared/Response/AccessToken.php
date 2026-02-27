<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AccessToken implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?bool $enabled = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $projectedExpirationDateByLackOfUse = null,
    ) {}
}