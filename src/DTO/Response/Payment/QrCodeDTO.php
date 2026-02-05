<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use Carbon\Carbon;
use SistemAtc\Asaas\Contracts\DTOInterface;

class QrCodeDTO implements DTOInterface
{
    public function __construct(
        public readonly ?string $encodedImage,
        public readonly ?string $payload,
        public readonly ?Carbon $expirationDate,
        public readonly ?string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            encodedImage: $data['encodedImage'] ?? null,
            payload: $data['payload'] ?? null,
            expirationDate: isset($data['expirationDate']) ? Carbon::parse($data['expirationDate']) : null,
            description: $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'encodedImage' => $this->encodedImage,
            'payload' => $this->payload,
            'expirationDate' => $this->expirationDate?->toDateTimeString(),
            'description' => $this->description,
        ], fn($v) => !is_null($v));
    }
}