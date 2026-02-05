<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class AnticipationCreditCardFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $detachedMonthlyFeeValue,
        public readonly ?float $installmentMonthlyFeeValue,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            detachedMonthlyFeeValue: isset($data['detachedMonthlyFeeValue']) ? (float) $data['detachedMonthlyFeeValue'] : null,
            installmentMonthlyFeeValue: isset($data['installmentMonthlyFeeValue']) ? (float) $data['installmentMonthlyFeeValue'] : null,
        );
    }

    public function toArray(): array { 
        return array_filter(get_object_vars($this), fn($v) => !is_null($v)); 
    }
}