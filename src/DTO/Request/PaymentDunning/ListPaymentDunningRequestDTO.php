<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDunning;

use SistemAtc\Asaas\Enum\DunningType;
use SistemAtc\Asaas\Enum\StatusDunning;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListPaymentDunningRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?StatusDunning $status,
        public readonly ?DunningType $type,
        public readonly ?string $payment,
        public readonly ?string $requestStartDate,
        public readonly ?string $requestEndDate,
    ) {}
}
