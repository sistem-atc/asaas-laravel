<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationCreditCardFees implements DTOInterface
{

    use CastToArray;

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
}