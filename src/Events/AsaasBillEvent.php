<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\BillWebhookDTO;

class AsaasBillEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public BillWebhookDTO $dto
    ) {}
}