<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class AsaasReceivableEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventDTOInterface $event,
        public ReceivableWebhookDTO $data
    ) {}
}
