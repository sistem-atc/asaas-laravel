<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\BillWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property BillWebhookDTO $event
 */
class BillHandler extends BaseAsaasHandler
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

    public function pending(): void
    {
        // To do implementation
    }

    public function bankProcessing(): void
    {
        // To do implementation
    }

    public function paid(): void
    {
        // To do implementation
    }

    public function cancelled(): void
    {
        // To do implementation
    }

    public function failed(): void
    {
        // To do implementation
    }

    public function refunded(): void
    {
        // To do implementation
    }

}
