<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\MobileWebhookDTO;

class AsaasMobileEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventAsaas $event,
        public MobileWebhookDTO $data
    ) {}
}
