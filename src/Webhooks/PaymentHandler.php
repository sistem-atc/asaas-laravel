<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasPaymentEvent;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\PaymentWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property PaymentWebhookDTO $event
 */
class PaymentHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {

        if (!$eventDTO instanceof PaymentWebhookDTO) {
            throw new \InvalidArgumentException("Handler esperado para PaymentWebhookDTO, recebido: " . get_class($eventDTO));
        }

        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        AsaasPaymentEvent::dispatch($this->event->event->value, $this->event);
        if (method_exists($this, $method)) $this->{$method}();
    }
}
