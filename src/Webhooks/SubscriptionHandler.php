<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasSubscriptionEvent;
use SistemAtc\Asaas\DTO\Webhook\SubscriptionWebhookDTO;

/**
 * @property SubscriptionWebhookDTO $event
 */
class SubscriptionHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasSubscriptionEvent::class;

    protected function expectedDTO(): string
    {
        return SubscriptionWebhookDTO::class;
    }
}