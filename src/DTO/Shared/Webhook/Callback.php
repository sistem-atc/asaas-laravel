<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class Callback
{
public function __construct(
        public readonly ?string $cancelUrl,
        public readonly ?string $successUrl,
        public readonly ?string $expiredUrl,
    ) {}

    public static function fromArray(array $data): self {
        return new self(
            cancelUrl: $data['cancelUrl'] ?? null,
            successUrl: $data['successUrl'] ?? null,
            expiredUrl: $data['expiredUrl'] ?? null,
        );
    }

    public function toArray(): array {
        return array_filter(get_object_vars($this), fn($v) => !is_null($v));
    }
}
