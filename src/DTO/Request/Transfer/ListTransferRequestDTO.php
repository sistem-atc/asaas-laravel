<?php

namespace SistemAtc\Asaas\DTO\Request\Transfer;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListTransferRequestDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $dateCreated__ge = null,
        public readonly ?string $dateCreated__le = null,
        public readonly ?string $transferDate__ge = null,
        public readonly ?string $transferDate__le = null,
        public readonly ?string $type = null,
    ) {}
}