<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasInvoiceEvent;
use SistemAtc\Asaas\DTO\Webhook\InvoiceWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property InvoiceWebhookDTO $event
 */
class InvoiceHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof InvoiceWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para InvoiceWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        AsaasInvoiceEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
