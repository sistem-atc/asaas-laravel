<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\AccountStatusWebhookDTO;

class AsaasAccountEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public AccountStatusWebhookDTO $dto
    ) {}
}