<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasPixEvent;
use SistemAtc\Asaas\DTO\Webhook\PixWebhookDTO;

/**
 * @property PixWebhookDTO $event
 */
class PixHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasPixEvent::class;

    protected function expectedDTO(): string
    {
        return PixWebhookDTO::class;
    }
}