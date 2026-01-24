<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\Balance;

class BalanceWebhookDTO extends BaseEventDTO
{
    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?Balance $balance,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            balance: isset($data['balance']) ? Balance::fromArray($data['balance']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(parent::toArray(),
            [
                'balance' => $this->balance?->toArray(),
            ]),
            fn($value) => !is_null($value)
        );
    }
}
