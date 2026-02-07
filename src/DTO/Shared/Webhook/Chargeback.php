<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Chargeback implements DTOInterface
{

    use CastToArray;

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
}