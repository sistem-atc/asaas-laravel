<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDunning;

use SistemAtc\Asaas\Enum\DunningType;
use SistemAtc\Asaas\Enum\StatusDunning;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class PaymentDunningResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?int $dunningNumber = null,
        public readonly ?StatusDunning $status = null,
        public readonly ?DunningType $type = null,
        public readonly ?string $requestDate = null,
        public readonly ?string $description = null,
        public readonly ?float $value = null,
        public readonly ?float $feeValue = null,
        public readonly ?float $netValue = null,
        public readonly ?string $denialReason = null,
        public readonly ?bool $canBeCancelled = null,
        public readonly ?string $cannotBeCancelledReason = null,
        public readonly ?bool $isNecessaryResendDocumentation = null,
        public readonly ?string $payment = null,
    ) {}
}