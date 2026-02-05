<?php

namespace SistemAtc\Asaas\Bases;

use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

abstract class BaseWebhookEventDTO implements WebhookEventDTOInterface
{
    protected function __construct(
        public readonly ?string $id,
        public readonly ?WebhookEventAsaas $event,
        public readonly ?string $dateCreated,
        public readonly ?Account $account,
    ) {}

    public function getEventType(): ?WebhookEventAsaas
    {
        return $this->event ?? null;
    }

    public function getEventId(): ?string
    {
        return $this->id ?? null;
    }

    public function getDateCreated(): ?string
    {
        return $this->dateCreated ?? null;
    }

    public function getAccount(): ?Account
    {
        return $this->account ?? null;
    }

}
