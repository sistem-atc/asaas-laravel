<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentSplit;

use SistemAtc\Asaas\Enum\StatusSplit;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListPaidSplitsRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $paymentId,
        public readonly ?StatusSplit $status = null,
        public readonly ?string $paymentConfirmedDate__ge,
        public readonly ?string $paymentConfirmedDate__le,
        public readonly ?string $creditDate__ge = null,
        public readonly ?string $creditDate__le = null,
    ) {}
}
