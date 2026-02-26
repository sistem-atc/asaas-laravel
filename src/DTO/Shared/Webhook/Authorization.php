<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\ImmediateQrCode;

class Authorization implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $status = null,
        public readonly ?string $customerId = null,
        public readonly ?string $frequency = null,
        public readonly ?float $value = null,
        public readonly ?string $startDate = null,
        public readonly ?string $finishDate = null,
        public readonly ?ImmediateQrCode $immediateQrCode = null,
    ) {}
}