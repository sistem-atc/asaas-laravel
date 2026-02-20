<?php

namespace SistemAtc\Asaas\DTO\Response\Transfer;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class AccountTransferResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $agency = null,
        public readonly ?string $account = null,
        public readonly ?string $accountDigit = null,
    ) {}
}