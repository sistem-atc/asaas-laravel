<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Webhook\AccountTransfer;

class Transfer implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $status = null,
        public readonly ?string $effectiveDate = null,
        public readonly ?string $endToEndIdentifier = null,
        public readonly ?string $type = null,
        public readonly ?float $value = null,
        public readonly ?float $netValue = null,
        public readonly ?float $transferFee = null,
        public readonly ?string $scheduleDate = null,
        public readonly ?bool $authorized = null,
        public readonly ?string $walletId = null,
        public readonly ?string $failReason = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?AccountTransfer $account = null,
        public readonly ?BankAccount $bankAccount = null,
        public readonly ?string $operationType = null,
        public readonly ?string $description = null,
    ) {}
}