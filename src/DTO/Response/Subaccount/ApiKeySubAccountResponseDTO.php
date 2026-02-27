<?php

namespace SistemAtc\Asaas\DTO\Response\Subaccount;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ApiKeySubAccountResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?bool $enabled = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $projectedExpirationDateByLackOfUse = null,
        public readonly ?string $apiKey = null,
    ) {}
}