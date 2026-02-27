<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\CheckoutWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class AsaasCheckoutEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventDTOInterface $event,
        public CheckoutWebhookDTO $data
    ) {}
}