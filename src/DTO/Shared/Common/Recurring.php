<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use InvalidArgumentException;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\RecurringFrequency;

class Recurring implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?RecurringFrequency $frequency = null,
        public readonly ?int $quantity = null,
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        if ($this->quantity < 1) {
            throw new InvalidArgumentException("A quantidade mínima de repetições é 1.");
        }

        match ($this->frequency) {
            RecurringFrequency::WEEKLY => $this->validateWeekly(),
            RecurringFrequency::MONTHLY => $this->validateMonthly(),
        };
    }

    private function validateWeekly(): void
    {
        if ($this->quantity > 51) {
            throw new InvalidArgumentException("Para frequência SEMANAL, o máximo de repetições é 51.");
        }
    }

    private function validateMonthly(): void
    {
        if ($this->quantity > 11) {
            throw new InvalidArgumentException("Para frequência MENSAL, o máximo de repetições é 11.");
        }
    }
}