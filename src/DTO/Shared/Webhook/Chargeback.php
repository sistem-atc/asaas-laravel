<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class Chargeback
{
    public function __construct(
        public readonly ?string $status,
        public readonly ?string $reason,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'] ?? null,
            reason: $data['reason'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'status' => $this->status,
            'reason' => $this->reason,
        ], fn($value) => !is_null($value));
    }
}
