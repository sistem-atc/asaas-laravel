<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\TransferWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

class AsaasTransferEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public WebhookEventDTOInterface $event,
        public TransferWebhookDTO $data
    ) {}
}
