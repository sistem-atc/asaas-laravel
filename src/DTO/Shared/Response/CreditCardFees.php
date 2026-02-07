<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditCardFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $operationValue,
        public readonly ?float $oneInstallmentPercentage,
        public readonly ?float $upToSixInstallmentsPercentage,
        public readonly ?float $upToTwelveInstallmentsPercentage,
        public readonly ?float $upToTwentyOneInstallmentsPercentage,
        public readonly ?float $discountOneInstallmentPercentage,
        public readonly ?float $discountUpToSixInstallmentsPercentage,
        public readonly ?float $discountUpToTwelveInstallmentsPercentage,
        public readonly ?float $discountUpToTwentyOneInstallmentsPercentage,
        public readonly ?string $discountExpiration,
        public readonly ?int $daysToReceive,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            operationValue: isset($data['operationValue']) ? (float) $data['operationValue'] : null,
            oneInstallmentPercentage: isset($data['oneInstallmentPercentage']) ? (float) $data['oneInstallmentPercentage'] : null,
            upToSixInstallmentsPercentage: isset($data['upToSixInstallmentsPercentage']) ? (float) $data['upToSixInstallmentsPercentage'] : null,
            upToTwelveInstallmentsPercentage: isset($data['upToTwelveInstallmentsPercentage']) ? (float) $data['upToTwelveInstallmentsPercentage'] : null,
            upToTwentyOneInstallmentsPercentage: isset($data['upToTwentyOneInstallmentsPercentage']) ? (float) $data['upToTwentyOneInstallmentsPercentage'] : null,
            discountOneInstallmentPercentage: isset($data['discountOneInstallmentPercentage']) ? (float) $data['discountOneInstallmentPercentage'] : null,
            discountUpToSixInstallmentsPercentage: isset($data['discountUpToSixInstallmentsPercentage']) ? (float) $data['discountUpToSixInstallmentsPercentage'] : null,
            discountUpToTwelveInstallmentsPercentage: isset($data['discountUpToTwelveInstallmentsPercentage']) ? (float) $data['discountUpToTwelveInstallmentsPercentage'] : null,
            discountUpToTwentyOneInstallmentsPercentage: isset($data['discountUpToTwentyOneInstallmentsPercentage']) ? (float) $data['discountUpToTwentyOneInstallmentsPercentage'] : null,
            discountExpiration: $data['discountExpiration'] ?? null,
            daysToReceive: $data['daysToReceive'] ?? null,
        );
    }
}