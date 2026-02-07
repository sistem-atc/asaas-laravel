<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class SubscriptionCheckout implements DTOInterface
{

    use CastToArray;

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
}