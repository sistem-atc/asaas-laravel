<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class CreditBureauReportFees implements DTOInterface
{
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

    public function toArray(): array { return array_filter(get_object_vars($this), fn($v) => !is_null($v)); }
}
