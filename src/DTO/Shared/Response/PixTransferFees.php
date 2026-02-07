<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class PixTransferFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $feeValue,
        public readonly ?float $discountValue,
        public readonly ?string $expirationDate,
        public readonly ?bool $consideredInMonthlyTransfersWithoutFee,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            feeValue: isset($data['feeValue']) ? (float) $data['feeValue'] : null,
            discountValue: isset($data['discountValue']) ? (float) $data['discountValue'] : null,
            expirationDate: $data['expirationDate'] ?? null,
            consideredInMonthlyTransfersWithoutFee: isset($data['consideredInMonthlyTransfersWithoutFee']) 
                ? (bool) $data['consideredInMonthlyTransfersWithoutFee'] 
                : null,
        );
    }
}