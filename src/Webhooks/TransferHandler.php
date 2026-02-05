<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasTransferEvent;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\TransferWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property TransferWebhookDTO $event
 */
class TransferHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof TransferWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para TransferWebhookDTO, recebido: " . get_class($eventDTO));
        }
        
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasTransferEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
