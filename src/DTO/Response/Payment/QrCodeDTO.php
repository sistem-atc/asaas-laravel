<?php

namespace SistemAtc\Asaas\DTO\Response\Payment;

use Carbon\Carbon;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class QrCodeDTO implements DTOInterface
{

    use CastToArray;
    
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
}