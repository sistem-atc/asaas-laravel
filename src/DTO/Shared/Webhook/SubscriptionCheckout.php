<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;

class SubscriptionCheckout implements DTOInterface
{
    public function __construct(
        public readonly ?string $cycle,
        public readonly ?string $nextDueDate,
        public readonly ?string $endDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            cycle: $data['cycle'] ?? null,
            nextDueDate: $data['nextDueDate'] ?? null,
            endDate: $data['endDate'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'cycle' => $this->cycle,
            'nextDueDate' => $this->nextDueDate,
            'endDate' => $this->endDate,
        ], fn($value) => !is_null($value));
    }
}
