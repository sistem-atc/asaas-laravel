<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class AnticipationBankSlipFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $monthlyFeePercentage
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            monthlyFeePercentage: isset($data['monthlyFeePercentage']) ? (float) $data['monthlyFeePercentage'] : null
        );
    }

    public function toArray(): array { 
        return array_filter(get_object_vars($this), fn($v) => !is_null($v)); 
    }
}