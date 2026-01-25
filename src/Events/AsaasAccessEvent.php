<?php

namespace SistemAtc\Asaas\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;

class AsaasAccessEvent
{

    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public AccessTokenWebhookDTO $dto
    ) {}
}