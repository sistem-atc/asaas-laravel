<?php

namespace SistemAtc\Asaas\Core;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class Mapping
{
    protected string $eventValue;

    public function __construct(WebhookEventAsaas $event){
        $this->eventValue = $event->value;
    }

    public function getCallable(): ?Closure
    {
        $prefix = $this->getPrefix();
        $suffix = $this->getSuffix();

        $handlerBaseName = Str::studly(Str::lower($prefix)) . 'Handler';
        $handlerClass = "App\\Services\\Asaas\\Webhooks\\{$handlerBaseName}";
        $methodName = Str::camel(Str::lower($suffix));

        if (!class_exists($handlerClass)) {
            Log::info("Webhook recebido, mas handler de classe não implementado: {$handlerClass}", [
                'event' => $this->eventValue
            ]);
            return null;
        }

        if (!method_exists($handlerClass, $methodName)) {
            Log::warning('Método não encontrado no handler.', [
                'class' => $handlerClass,
                'method' => $methodName
            ]);
            return null;
        }

        return function (WebhookEventDTOInterface $eventDTO) use ($handlerClass, $methodName) {
            $handler = app($handlerClass);

            if (!($handler instanceof BaseAsaasHandler)) {
               throw new \RuntimeException("A classe {$handlerClass} deve estender BaseAsaasHandler.");
            }

            return $handler($eventDTO, $methodName);
        };

    }

    private function getPrefix(): string
    {
        return Str::before($this->eventValue, '_');
    }

    private function getSuffix(): string
    {
        return Str::after($this->eventValue, $this->getPrefix() . '_');
    }
}
