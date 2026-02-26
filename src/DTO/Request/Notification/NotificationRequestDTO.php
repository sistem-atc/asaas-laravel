<?php

namespace SistemAtc\Asaas\DTO\Request\Notification;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\PaymentOverdue;
use SistemAtc\Asaas\Contracts\DTOInterface;

class NotificationRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?bool $emailEnabledForProvider = null,
        public readonly ?bool $smsEnabledForProvider = null,
        public readonly ?bool $emailEnabledForCustomer = null,
        public readonly ?bool $smsEnabledForCustomer = null,
        public readonly ?bool $phoneCallEnabledForCustomer = null,
        public readonly ?bool $whatsappEnabledForCustomer = null,
        public readonly ?PaymentOverdue $scheduleOffset = null,
    ) {}
}