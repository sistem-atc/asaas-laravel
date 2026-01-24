<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Bill;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;

class BillWebhookDTO extends BaseEventDTO
{
    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?Bill $bill,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            bill: isset($data['bill']) ? Bill::fromArray($data['bill']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(parent::toArray(),
            [
                'bill' => $this->bill?->toArray(),
            ]),
            fn($value) => !is_null($value)
        );
    }
}
