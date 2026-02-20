<?php

namespace SistemAtc\Asaas\DTO\Response\Chargeback;

use SistemAtc\Asaas\Enum\DisputeStatus;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\ChargebackReason;
use SistemAtc\Asaas\Enum\ChargebackStatus;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\ChargebackCreditCard;

final class ChargebackResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?string $customerAccount = null,
        public readonly ?ChargebackStatus $status = null,
        public readonly ?ChargebackReason $reason = null,
        public readonly ?string $disputeStartDate = null,
        public readonly ?float $value = null,
        public readonly ?string $paymentDate = null,
        public readonly ?ChargebackCreditCard $creditCard = null,
        public readonly ?DisputeStatus $disputeStatus = null,
        public readonly ?string $deadlineToSendDisputeDocuments = null,
    ) {}
}