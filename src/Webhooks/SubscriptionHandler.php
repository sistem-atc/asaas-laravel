<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\DTO\Webhook\SubscriptionWebhookDTO;
use SistemAtc\Asaas\Events\AsaasSubscriptionEvent;

/**
 * @property SubscriptionWebhookDTO $event
 */
class SubscriptionHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof SubscriptionWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para SubscriptionWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        AsaasSubscriptionEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
