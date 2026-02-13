<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Enum\StatusRefund;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class PaymentRefunds implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $dateCreated = null,
        public readonly ?StatusRefund $status = null,
        public readonly ?float $value = null,
        public readonly ?string $endToEndIdentifier = null,
        public readonly ?string $description = null,
        public readonly ?string $effectiveDate = null,
        public readonly ?string $transactionReceiptUrl = null,
        #[ArrayOf(RefundedSplits::class)] public readonly ?array $refundedSplits = null,
    ) {}
}