<?php

namespace SistemAtc\Asaas\Contracts;

use SistemAtc\Asaas\Enum\WebhookEventAsaas;

interface WebhookEventDTOInterface
{
    public function getEventType(): ?WebhookEventAsaas;
    public function getEventId(): ?string;
    public function getDateCreated(): ?string;
    public static function fromArray(array $data): self;
    public function toArray(): array;
}
