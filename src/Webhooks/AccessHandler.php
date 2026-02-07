<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasAccessEvent;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property AccessTokenWebhookDTO $event
 */
class AccessHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof AccessTokenWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para AccessTokenWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        AsaasAccessEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
