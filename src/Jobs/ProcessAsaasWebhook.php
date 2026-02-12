<?php

namespace SistemAtc\Asaas\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use SistemAtc\Asaas\Core\Mapping;
use SistemAtc\Asaas\DTO\Factory\AsaasWebhookRegistry;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

class ProcessAsaasWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use HandlesIdempotency;

    public $tries = 1;
    public $maxExceptions = 1;

    public function __construct(
        public readonly array $payload
    ) {}

    public function handle(): void
    {
        try {
            $eventDTO = AsaasWebhookRegistry::map($this->payload);
            $eventId = (string) $eventDTO->getEventId();

            if ($eventId === '') {
                Log::error("WebHook_Event: Missing eventId", ['payload' => $this->payload]);
                return;
            }

            if ($this->wasAlreadyProcessed($eventId)) {
                return;
            }
            
            $event = WebhookEventAsaas::from($eventDTO->getEventType()->value);
            $mapping = new Mapping($event);
            $callable = $mapping->getCallable();
            
            if ($callable) {
                $callable($eventDTO);
            } else {
                Log::info("Método Inexistente para o evento: {$event->value}", ['payload' => $this->payload]);
            }

        } catch (InvalidArgumentException $e) {
            Log::error("WebHook_Event: Invalid Payload: " . $e->getMessage(), ['payload' => $this->payload]);
            return;
        } catch (\Throwable $e) {
            Log::error(
                "WebHook_Event: UNEXPECTED ERROR: {$e->getMessage()} on line {$e->getLine()}",
                ['payload' => $this->payload, 'trace' => $e->getTraceAsString()]
            );
            throw $e;
        }
    }

}
