<?php

namespace SistemAtc\Asaas\Jobs;

use Illuminate\Bus\Queueable;
use InvalidArgumentException;
use SistemAtc\Asaas\Core\Mapping;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Factory\WebhookDTOFactory;

class ProcessAsaasWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function __construct(
        public readonly array $payload
    ) {}

    public function handle(): void
    {
        try {
            $eventDTO = WebhookDTOFactory::create($this->payload);
            $event = WebhookEventAsaas::from($eventDTO->getEventType()->value);
            $mapping = new Mapping($event);
            $callable = $mapping->getCallable();
            
            if ($callable) {
                $callable($eventDTO);
            } else {
                Log::info(
                    "Método Inexistente para o evento: {$event->value}",
                    $this->payload
                );
            }

        } catch (InvalidArgumentException $e) {
            Log::error(
                "WebHook_Event: Invalid Payload: " . $e->getMessage(),
                $this->payload
            );
        } catch (\Throwable $e) {
            Log::error(
                "WebHook_Event: UNEXPECTED ERROR: {$e->getMessage()} on line {$e->getLine()}",
                ['payload' => $this->payload, 'trace' => $e->getTraceAsString()]
            );
            throw $e;
        }
    }

}
