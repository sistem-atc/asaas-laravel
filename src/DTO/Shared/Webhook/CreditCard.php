<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditCard implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $creditCardNumber,
        public readonly ?string $creditCardBrand,
        public readonly ?string $creditCardToken,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCardNumber: $data['creditCardNumber'] ?? null,
            creditCardBrand: $data['creditCardBrand'] ?? null,
            creditCardToken: $data['creditCardToken'] ?? null,
        );
    }
}