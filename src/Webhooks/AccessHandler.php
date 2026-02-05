<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasAccessEvent;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property AccessTokenWebhookDTO $event
 */
class AccessHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof AccessTokenWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para AccessTokenWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasAccessEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
