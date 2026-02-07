<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Balance implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $value,
        public readonly ?string $date,
        public readonly ?string $description,
        public readonly ?string $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: isset($data['value']) ? (float) $data['value'] : null,
            date: $data['date'] ?? null,
            description: $data['description'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}