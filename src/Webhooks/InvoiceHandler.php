<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\InvoiceWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property InvoiceWebhookDTO $event
 */
class InvoiceHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        $this->{$method}();
    }

    public function created(): void
    {
        // To do implementation
    }

    public function updated(): void
    {
        // To do implementation
    }

    public function synchronized(): void
    {
        // To do implementation
    }

    public function authorized(): void
    {
        // To do implementation
    }

    public function processingCancellation(): void
    {
        // To do implementation
    }

    public function canceled(): void
    {
        // To do implementation
    }

    public function cancellationDenied(): void
    {
        // To do implementation
    }

    public function error(): void
    {
        // To do implementation
    }

}
