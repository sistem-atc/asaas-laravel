<?php

namespace SistemAtc\Asaas\Bases;

use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\Bases\BaseWebhookEventDTO;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;

abstract class BaseEventDTO extends BaseWebhookEventDTO
{

    protected function __construct(?string $id, ?WebhookEventAsaas $event, ?string $dateCreated, ?Account $account)
    {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id ?? null,
            'event' => $this->event->value ?? null,
            'dateCreated' => $this->dateCreated ?? null,
            'account' => $this->account ?? null,
        ];
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);
        return new static(...$params);
    }

    protected static function getBaseParams(array $data): array
    {
        $rawId = $data['id'] ?? null;
        return [
            'id' => is_string($rawId) ? explode('&', $rawId)[0] : $rawId,
            'event' => isset($data['event']) ? WebhookEventAsaas::tryFrom($data['event']) : null,
            'dateCreated' => $data['dateCreated'] ?? null,
            'account' => isset($data['account']) ? Account::fromArray($data['account']) : null,
        ];
    }

}
