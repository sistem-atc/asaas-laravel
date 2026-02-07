<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class InternalTransferData implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $description,
        public readonly ?float $value,
        public readonly ?string $date,
        public readonly ?string $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            description: $data['description'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            date: $data['date'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}