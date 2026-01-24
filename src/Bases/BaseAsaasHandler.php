<?php

namespace SistemAtc\Asaas\Bases;

use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

abstract class BaseAsaasHandler
{
    protected WebhookEventDTOInterface $event;

    public function __invoke(WebhookEventDTOInterface $event, string $method)
    {
        $this->setEvent($event);

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }

    public function setEvent(WebhookEventDTOInterface $event): void
    {
        $this->event = $event;
    }

    protected function getEvent(): WebhookEventDTOInterface
    {
        return $this->event;
    }

}
