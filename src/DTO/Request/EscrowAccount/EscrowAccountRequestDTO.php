<?php

namespace SistemAtc\Asaas\DTO\Request\EscrowAccount;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class EscrowAccountRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly int $daysToExpire,
        public readonly ?bool $enabled = null,
        public readonly ?bool $isFeePayer = null,
    ) {}
}
