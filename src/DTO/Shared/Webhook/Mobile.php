<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\StatusMobile;

class Mobile
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?float $value,
        public readonly ?string $phoneNumber,
        public readonly ?StatusMobile $status,
        public readonly bool $canBeCancelled,
        public readonly ?string $operatorName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            phoneNumber: $data['phoneNumber'] ?? null,
            status: isset($data['status']) ? StatusMobile::tryFrom($data['status']) : null,
            canBeCancelled: (bool) ($data['canBeCancelled'] ?? false),
            operatorName: $data['operatorName'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'value' => $this->value,
            'phoneNumber' => $this->phoneNumber,
            'status' => $this->status?->value,
            'canBeCancelled' => $this->canBeCancelled,
            'operatorName' => $this->operatorName,
        ], fn($value) => !is_null($value));
    }
}
