<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class NotificationFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $phoneCallFeeValue = null,
        public readonly ?float $whatsAppFeeValue = null,
        public readonly ?float $messagingFeeValue = null,
    ) {}
}