<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class BankAccount implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?Bank $bank = null,
        public readonly ?string $accountName = null,
        public readonly ?string $ownerName = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $agency = null,
        public readonly ?string $agencyDigit = null,
        public readonly ?string $account = null,
        public readonly ?string $accountDigit = null,
        public readonly ?string $pixAddressKey = null,
    ) {}
}