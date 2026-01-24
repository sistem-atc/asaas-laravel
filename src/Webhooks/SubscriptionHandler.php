<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\DTO\Webhook\SubscriptionWebhookDTO;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property SubscriptionWebhookDTO $event
 */
class SubscriptionHandler extends BaseAsaasHandler
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

    public function inactivated(): void
    {
        // To do implementation
    }

    public function deleted(): void
    {
        // To do implementation
    }

    public function splitDivergenceBlock(): void
    {
        // To do implementation
    }

    public function splitDivergenceBlockFinished(): void
    {
        // To do implementation
    }
}
