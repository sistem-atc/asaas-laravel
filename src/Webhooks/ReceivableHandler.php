<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasReceivableEvent;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property ReceivableWebhookDTO $event
 */
class ReceivableHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof ReceivableWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para ReceivableWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        AsaasReceivableEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
