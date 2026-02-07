<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditBureauReportFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $naturalPersonFeeValue,
        public readonly ?float $legalPersonFeeValue,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            naturalPersonFeeValue: isset($data['naturalPersonFeeValue']) ? (float) $data['naturalPersonFeeValue'] : null,
            legalPersonFeeValue: isset($data['legalPersonFeeValue']) ? (float) $data['legalPersonFeeValue'] : null,
        );
    }
}