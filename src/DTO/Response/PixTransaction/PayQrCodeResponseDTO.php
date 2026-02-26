<?php

namespace SistemAtc\Asaas\DTO\Response\PixTransaction;

use SistemAtc\Asaas\DTO\Shared\Response\ExternalAccount;
use SistemAtc\Asaas\DTO\Shared\Response\OriginalTransaction;
use SistemAtc\Asaas\DTO\Shared\Response\QrCode;
use SistemAtc\Asaas\Enum\Finality;
use SistemAtc\Asaas\Enum\OriginPixType;
use SistemAtc\Asaas\Enum\PixAddressKeyType;
use SistemAtc\Asaas\Enum\StatusQrCode;
use SistemAtc\Asaas\Enum\TypeQrCode;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class PayQrCodeResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $endToEndIdentifier = null,
        public readonly ?Finality $finality = null,
        public readonly ?float $value = null,
        public readonly ?float $changeValue = null,
        public readonly ?float $refundedValue = null,
        public readonly ?string $effectiveDate = null,
        public readonly ?string $scheduledDate = null,
        public readonly ?StatusQrCode $status = null,
        public readonly ?TypeQrCode $type = null,
        public readonly ?OriginPixType $originType = null,
        public readonly ?string $conciliationIdentifier = null,
        public readonly ?string $description = null,
        public readonly ?string $transactionReceiptUrl = null,
        public readonly ?string $refusalReason = null,
        public readonly ?bool $canBeCanceled = null,
        public readonly ?OriginalTransaction $originalTransaction = null,
        public readonly ?ExternalAccount $externalAccount = null,
        public readonly ?QrCode $qrCode = null,
        public readonly ?string $payment = null,
        public readonly ?bool $canBeRefunded = null,
        public readonly ?string $refundDisabledReason = null,
        public readonly ?float $chargedFeeValue = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $addressKey = null,
        public readonly ?PixAddressKeyType $addressKeyType = null,
        public readonly ?string $transferId = null,
        public readonly ?string $externalReference = null,
    ) {}
}