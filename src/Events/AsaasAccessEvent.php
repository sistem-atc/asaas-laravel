<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class AsaasAccessEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventDTOInterface $event,
        public AccessTokenWebhookDTO $data
    ) {}
}