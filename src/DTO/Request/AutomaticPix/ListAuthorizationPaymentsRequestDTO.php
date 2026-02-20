<?php

namespace SistemAtc\Asaas\DTO\Request\AutomaticPix;

use SistemAtc\Asaas\Enum\StatusPixPayment;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListAuthorizationPaymentsRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $authorizationId = null,
        public readonly ?string $customerId = null,
        public readonly ?string $paymentId = null,
        public readonly ?StatusPixPayment $status = null,
    ) {}
}