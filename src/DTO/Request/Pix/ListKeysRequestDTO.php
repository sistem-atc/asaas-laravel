<?php

namespace SistemAtc\Asaas\DTO\Request\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\PixAddressKeyStatus;

class ListKeysRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?PixAddressKeyStatus $status = null,
        public readonly ?string $statusList = null,
    ) {}
}