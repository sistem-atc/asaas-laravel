<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class PixFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $fixedFeeValue,
        public readonly ?float $fixedFeeValueWithDiscount,
        public readonly ?float $percentageFee,
        public readonly ?float $minimumFeeValue,
        public readonly ?float $maximumFeeValue,
        public readonly ?string $discountExpiration,
        public readonly ?int $monthlyCreditsWithoutFee,
        public readonly ?int $creditsReceivedOfCurrentMonth,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fixedFeeValue: isset($data['fixedFeeValue']) ? (float) $data['fixedFeeValue'] : null,
            fixedFeeValueWithDiscount: isset($data['fixedFeeValueWithDiscount']) ? (float) $data['fixedFeeValueWithDiscount'] : null,
            percentageFee: isset($data['percentageFee']) ? (float) $data['percentageFee'] : null,
            minimumFeeValue: isset($data['minimumFeeValue']) ? (float) $data['minimumFeeValue'] : null,
            maximumFeeValue: isset($data['maximumFeeValue']) ? (float) $data['maximumFeeValue'] : null,
            discountExpiration: $data['discountExpiration'] ?? null,
            monthlyCreditsWithoutFee: $data['monthlyCreditsWithoutFee'] ?? null,
            creditsReceivedOfCurrentMonth: $data['creditsReceivedOfCurrentMonth'] ?? null,
        );
    }
}