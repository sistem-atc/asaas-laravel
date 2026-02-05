<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;

class InternalTransferData implements DTOInterface
{
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

    public function toArray(): array
    {
        return array_filter([
            'description' => $this->description,
            'value' => $this->value,
            'date' => $this->date,
            'type' => $this->type,
        ], fn($value) => !is_null($value));
    }

}
