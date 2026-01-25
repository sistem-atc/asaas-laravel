<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\CheckoutWebhookDTO;

class AsaasCheckoutEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public CheckoutWebhookDTO $dto
    ) {}
}