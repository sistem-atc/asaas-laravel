<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\Checkout;

class CheckoutWebhookDTO extends BaseEventDTO
{
    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?Checkout $checkout,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            checkout: isset($data['checkout']) ? Checkout::fromArray($data['checkout']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(parent::toArray(),
            [
                'checkout' => $this->checkout?->toArray(),
            ]),
            fn($value) => !is_null($value)
        );
    }
}
