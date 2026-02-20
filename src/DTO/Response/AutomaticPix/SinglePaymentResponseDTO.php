<?php

namespace SistemAtc\Asaas\DTO\Response\AutomaticPix;

use SistemAtc\Asaas\DTO\Shared\Response\Authorization;
use SistemAtc\Asaas\Enum\StatusPixPayment;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class SinglePaymentResponseDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?bool $endToEndIdentifier = null,
        public readonly ?Authorization $authorization = null,
        public readonly ?string $dueDate = null,
        public readonly ?StatusPixPayment $status = null,
        public readonly ?string $paymentId = null,
    ) {}
}