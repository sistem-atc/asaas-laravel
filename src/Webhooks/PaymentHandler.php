<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasPaymentEvent;
use SistemAtc\Asaas\DTO\Webhook\PaymentWebhookDTO;

/**
 * @property PaymentWebhookDTO $event
 */
class PaymentHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasPaymentEvent::class;

    protected function expectedDTO(): string
    {
        return PaymentWebhookDTO::class;
    }
}