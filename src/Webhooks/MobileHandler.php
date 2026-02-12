<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasMobileEvent;
use SistemAtc\Asaas\DTO\Webhook\MobileWebhookDTO;

/**
 * @property MobileWebhookDTO $event
 */
class MobileHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasMobileEvent::class;

    protected function expectedDTO(): string
    {
        return MobileWebhookDTO::class;
    }
}