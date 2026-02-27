<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\InternalWebhookDTO;

class AsaasInternalEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventAsaas $event,
        public InternalWebhookDTO $data
    ) {}
}