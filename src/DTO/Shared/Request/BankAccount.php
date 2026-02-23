<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\BankAccountType;
use SistemAtc\Asaas\Contracts\DTOInterface;

class BankAccount implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?BankCode $bank = null,
        public readonly ?string $accountName = null,
        public readonly string $ownerName,
        public readonly ?string $ownerBirthDate,
        public readonly string $cpfCnpj,
        public readonly string $agency,
        public readonly string $account,
        public readonly string $accountDigit,
        public readonly ?BankAccountType $bankAccountType,
        public readonly ?string $ispb,
    ) {}
}
