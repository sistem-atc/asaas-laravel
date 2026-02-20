<?php

namespace SistemAtc\Asaas\DTO\Request\AutomaticPix;

use SistemAtc\Asaas\Enum\StatusPix;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListAuthorizationRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?StatusPix $status = null,
        public readonly ?string $customerId = null,
    ) {}
}