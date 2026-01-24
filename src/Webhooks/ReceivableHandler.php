<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property ReceivableWebhookDTO $event
 */
class ReceivableHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        $this->{$method}();
    }

    public function anticipationCancelled()
    {
        //Stay to implements
    }

    public function anticipationScheduled()
    {
        //Stay to implements
    }

    public function anticipationPending()
    {
        //Stay to implements
    }

    public function anticipationCredited()
    {
        //Stay to implements
    }

    public function anticipationDebited()
    {
        //Stay to implements
    }

    public function anticipationDenied()
    {
        //Stay to implements
    }

    public function anticipationOverdue()
    {
        //Stay to implements
    }

}
