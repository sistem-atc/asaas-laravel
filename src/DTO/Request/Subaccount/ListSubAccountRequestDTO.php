<?php

namespace SistemAtc\Asaas\DTO\Request\Subaccount;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListSubAccountRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $cpfCnpj = null,
        public readonly string $email,
        public readonly ?string $name = null,
        public readonly ?string $walletId = null,
    ) {}
}