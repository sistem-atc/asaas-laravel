<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasBalanceEvent;
use SistemAtc\Asaas\DTO\Webhook\BalanceWebhookDTO;

/**
 * @property BalanceWebhookDTO $event
 */
class BalanceHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasBalanceEvent::class;

    protected function expectedDTO(): string
    {
        return BalanceWebhookDTO::class;
    }
}