<?php

namespace SistemAtc\Asaas\DTO\Request\Notification;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class UpdateNotificationBatchRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $customer,
        #[ArrayOf(NotificationRequestDTO::class)] public readonly ?array $notifications = null,
    ) {}
}