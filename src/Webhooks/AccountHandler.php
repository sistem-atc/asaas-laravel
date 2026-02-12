<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasAccountEvent;
use SistemAtc\Asaas\DTO\Webhook\AccountStatusWebhookDTO;

/**
 * @property AccountStatusWebhookDTO $event
 */
class AccountHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasAccountEvent::class;

    protected function expectedDTO(): string
    {
        return AccountStatusWebhookDTO::class;
    }
}
