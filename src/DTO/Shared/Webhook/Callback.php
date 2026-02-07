<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Callback implements DTOInterface
{

    use CastToArray;

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
}