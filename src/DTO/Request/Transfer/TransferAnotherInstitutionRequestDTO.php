<?php

namespace SistemAtc\Asaas\DTO\Request\Transfer;

use SistemAtc\Asaas\DTO\Shared\Common\Recurring;
use SistemAtc\Asaas\Enum\OperationType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\PixAddressKeyType;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\BankAccount;

final class TransferAnotherInstitutionRequestDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly float $value,
        public readonly ?BankAccount $bankAccount = null,
        public readonly ?OperationType $operationType = null,
        public readonly ?string $pixAddressKey = null,
        public readonly ?PixAddressKeyType $pixAddressKeyType = null,
        public readonly ?string $description = null,
        public readonly ?string $scheduleDate = null,
        public readonly ?string $externalReference = null,
        public readonly ?Recurring $recurring = null,
    ) {}
}