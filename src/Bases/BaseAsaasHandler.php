<?php

namespace SistemAtc\Asaas\Bases;

use InvalidArgumentException;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

abstract class BaseAsaasHandler
{
    protected WebhookEventDTOInterface $event;
    abstract protected function expectedDTO(): string;
    protected ?string $eventClass = null;

    public function __invoke(WebhookEventDTOInterface $event, string $method)
    {
        $expected = $this->expectedDTO();
        if (!$event instanceof $expected) {
            throw new InvalidArgumentException(
                sprintf("Handler %s espera %s, recebido: %s", 
                static::class, $expected, get_class($event))
            );
        }

        $this->setEvent($event);

        $this->dispatch($event);

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }

    protected function dispatch(WebhookEventDTOInterface $eventDTO): void
    {
        if ($this->eventClass && method_exists($this->eventClass, 'dispatch')) {
            $eventType = $eventDTO->getEventType();
            ($this->eventClass)::dispatch($eventType, $eventDTO);
        }
    }

    public function setEvent(WebhookEventDTOInterface $event): void
    {
        $this->event = $event;
    }
}
