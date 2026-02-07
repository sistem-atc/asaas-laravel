<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationBankSlipFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $monthlyFeePercentage
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            monthlyFeePercentage: isset($data['monthlyFeePercentage']) ? (float) $data['monthlyFeePercentage'] : null
        );
    }
}