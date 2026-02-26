<?php

namespace SistemAtc\Asaas\DTO\Response\RecurringPix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\OriginRecurrence;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\FrequencyRecurrence;
use SistemAtc\Asaas\Enum\StatusRecurrencesPix;
use SistemAtc\Asaas\DTO\Shared\Response\RecurrenceExternalAccount;

class SingleRecurrenceResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?StatusRecurrencesPix $status = null,
        public readonly ?OriginRecurrence $origin = null,
        public readonly ?float $value = null,
        public readonly ?FrequencyRecurrence $frequency = null,
        public readonly ?int $quantity = null,
        public readonly ?string $startDate = null,
        public readonly ?string $finishDate = null,
        public readonly ?bool $canBeCancelled = null,
        public readonly ?RecurrenceExternalAccount $externalAccount = null,
    ) {}
}