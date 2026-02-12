<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasInternalEvent;
use SistemAtc\Asaas\DTO\Webhook\InternalWebhookDTO;

/**
 * @property InternalWebhookDTO $event
 */
class InternalHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasInternalEvent::class;

    protected function expectedDTO(): string
    {
        return InternalWebhookDTO::class;
    }
}