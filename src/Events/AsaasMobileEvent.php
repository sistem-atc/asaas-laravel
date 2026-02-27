<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\MobileWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class AsaasMobileEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventDTOInterface $event,
        public MobileWebhookDTO $data
    ) {}
}
