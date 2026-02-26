<?php

namespace SistemAtc\Asaas\DTO\Response\EscrowAccount;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class EscrowAccountResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $daysToExpire = null,
        public readonly ?bool $enabled = null,
        public readonly ?bool $isFeePayer = null,
    ) {}
}