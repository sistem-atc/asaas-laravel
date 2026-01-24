<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\TransferWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property TransferWebhookDTO $event
 */
class TransferHandler extends BaseAsaasHandler
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

    public function inBankProcessing(): void
    {
        // To do implementation
    }

    public function blocked(): void
    {
        // To do implementation
    }

    public function done(): void
    {
        // To do implementation
    }

    public function failed(): void
    {
        // To do implementation
    }

    public function cancelled(): void
    {
        // To do implementation
    }

}
