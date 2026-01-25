<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\InvoiceWebhookDTO;

class AsaasInvoiceEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public InvoiceWebhookDTO $dto,
    ) {}
}