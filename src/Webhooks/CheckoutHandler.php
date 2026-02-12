<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasCheckoutEvent;
use SistemAtc\Asaas\DTO\Webhook\CheckoutWebhookDTO;

/**
 * @property CheckoutWebhookDTO $event
 */
class CheckoutHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasCheckoutEvent::class;

    protected function expectedDTO(): string
    {
        return CheckoutWebhookDTO::class;
    }
}