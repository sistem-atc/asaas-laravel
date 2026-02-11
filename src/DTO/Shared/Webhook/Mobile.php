<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\StatusMobile;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Mobile implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?float $value = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?StatusMobile $status = null,
        public readonly ?bool $canBeCancelled = null,
        public readonly ?string $operatorName = null,
    ) {}
}