<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Events\AsaasBillEvent;
use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\BillWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property BillWebhookDTO $event
 */
class BillHandler extends BaseAsaasHandler
{

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof BillWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para BillWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        AsaasBillEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
