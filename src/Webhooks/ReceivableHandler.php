<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\Events\AsaasReceivableEvent;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property ReceivableWebhookDTO $event
 */
class ReceivableHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof ReceivableWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para ReceivableWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasReceivableEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
