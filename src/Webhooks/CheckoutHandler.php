<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasCheckoutEvent;
use SistemAtc\Asaas\DTO\Webhook\CheckoutWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property CheckoutWebhookDTO $event
 */
class CheckoutHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof CheckoutWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para CheckoutWebhookDTO, recebido: " . get_class($eventDTO));
        }
        
        $this->setEvent($eventDTO);
        AsaasCheckoutEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
