<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class DeletePaymentSummaryResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?bool $deleted = null,
        public readonly ?string $id = null,
    ) {}
}