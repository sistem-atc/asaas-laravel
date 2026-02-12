<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasAccessEvent;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;

/**
 * @property AccessTokenWebhookDTO $event
 */
class AccessHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasAccessEvent::class;

    protected function expectedDTO(): string
    {
        return AccessTokenWebhookDTO::class;
    }
}
