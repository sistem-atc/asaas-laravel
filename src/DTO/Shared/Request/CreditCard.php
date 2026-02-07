<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditCard implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $holderName,
        public readonly ?string $number,
        public readonly ?string $expiryMonth,
        public readonly ?string $expiryYear,
        public readonly ?string $ccv,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            holderName: $data['holderName'] ?? null,
            number: isset($data['number']) ? preg_replace('/\D/', '', $data['number']) : null,
            expiryMonth: $data['expiryMonth'] ?? null,
            expiryYear: $data['expiryYear'] ?? null,
            ccv: $data['ccv'] ?? null,
        );
    }
}
