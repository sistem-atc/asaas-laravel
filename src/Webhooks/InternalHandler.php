<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasInternalEvent;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\InternalWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property InternalWebhookDTO $event
 */
class InternalHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof InternalWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para InternalWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasInternalEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
