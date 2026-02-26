<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDunning;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\DunningSimulate;

final class SimulatePaymentDunningResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $payment = null,
        public readonly ?float $value = null,
        #[ArrayOf(DunningSimulate::class)] public readonly ?array $typeSimulations = null,
    ) {}
}