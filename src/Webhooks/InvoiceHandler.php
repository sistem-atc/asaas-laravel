<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasInvoiceEvent;
use SistemAtc\Asaas\DTO\Webhook\InvoiceWebhookDTO;

/**
 * @property InvoiceWebhookDTO $event
 */
class InvoiceHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasInvoiceEvent::class;

    protected function expectedDTO(): string
    {
        return InvoiceWebhookDTO::class;
    }
}