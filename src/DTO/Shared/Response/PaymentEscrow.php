<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\FinishReason;
use SistemAtc\Asaas\Enum\StatusEscrow;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class PaymentEscrow implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?StatusEscrow $status = null,
        public readonly ?string $expirationDate = null,
        public readonly ?string $finishDate = null,
        public readonly ?FinishReason $finishReason = null,
    ) {}
}