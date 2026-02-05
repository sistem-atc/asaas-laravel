<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class TedFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $feeValue,
        public readonly ?bool $consideredInMonthlyTransfersWithoutFee,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            feeValue: isset($data['feeValue']) ? (float) $data['feeValue'] : null,
            consideredInMonthlyTransfersWithoutFee: isset($data['consideredInMonthlyTransfersWithoutFee']) 
                ? (bool) $data['consideredInMonthlyTransfersWithoutFee'] 
                : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($v) => !is_null($v));
    }
}