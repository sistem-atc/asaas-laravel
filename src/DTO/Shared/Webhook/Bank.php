<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class Bank
{
    public function __construct(
        public readonly ?string $ispb,
        public readonly ?string $code,
        public readonly ?string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            ispb: $data['ispb'] ?? null,
            code: $data['code'] ?? null,
            name: $data['name'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'ispb' => $this->ispb,
            'code' => $this->code,
            'name' => $this->name,
        ], fn($value) => !is_null($value));
    }
}
