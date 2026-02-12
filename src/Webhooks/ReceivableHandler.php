<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasReceivableEvent;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;

/**
 * @property ReceivableWebhookDTO $event
 */
class ReceivableHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasReceivableEvent::class;

    protected function expectedDTO(): string
    {
        return ReceivableWebhookDTO::class;
    }
}