<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\AccessWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property AccessWebhookDTO $event
 */
class AccessHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        $this->{$method}();
    }

    public function tokenCreated(): void
    {
        //Stay to implements
    }

    public function tokenEnabled(): void
    {
        //  Stay to implements
    }

    public function tokenDisabled(): void
    {
        //  Stay to implements
    }

    public function tokenDeleted(): void
    {
        //  Stay to implements
    }

    public function tokenExpiringSoon(): void
    {
        //  Stay to implements
    }

    public function tokenExpired(): void
    {
        //  Stay to implements
    }

}
