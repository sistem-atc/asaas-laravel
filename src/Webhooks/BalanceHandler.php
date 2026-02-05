<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasBalanceEvent;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\BalanceWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property BalanceWebhookDTO $event
 */
class BalanceHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof BalanceWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para BalanceWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasBalanceEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
