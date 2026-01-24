<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\MobileWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 * @property MobileWebhookDTO $event
 */
class MobileHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        $this->{$method}();
    }

    public function phoneRechargePending()
    {
        //Stay to implements
    }

    public function phoneRechargeCancelled()
    {
        //Stay to implements
    }

    public function phoneRechargeConfirmed()
    {
        //Stay to implements
    }

    public function phoneRechargeRefunded()
    {
        //Stay to implements
    }

}
