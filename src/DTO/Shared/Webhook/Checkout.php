<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Checkout implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $id,
        public readonly ?string $link,
        public readonly ?string $status,
        public readonly ?int $minutesToExpire,
        public readonly ?array $billingTypes,
        public readonly ?array $chargeTypes,
        public readonly ?Callback $callback,
        public readonly ?array $items,
        public readonly ?SubscriptionCheckout $subscription,
        public readonly ?string $installment,
        public readonly ?array $split,
        public readonly ?string $customer,
        public readonly ?string $customerData,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            link: $data['link'] ?? null,
            status: $data['status'] ?? null,
            minutesToExpire: $data['minutesToExpire'] ?? null,
            billingTypes: $data['billingTypes'] ?? [],
            chargeTypes: $data['chargeTypes'] ?? [],
            callback: isset($data['callback']) ? Callback::fromArray($data['callback']) : null,
            items: array_map(fn($item) => Items::fromArray($item), $data['items'] ?? []),
            subscription: isset($data['subscription']) ? SubscriptionCheckout::fromArray($data['subscription']) : null,
            installment: $data['installment'] ?? null,
            split: array_map(fn($item) => Split::fromArray($item), $data['split'] ?? []),
            customer: $data['customer'] ?? null,
            customerData: $data['customerData'] ?? null,
        );
    }
}