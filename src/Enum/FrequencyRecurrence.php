<?php

namespace SistemAtc\Asaas\Enum;

enum FrequencyRecurrence: string
{
    case WEEKLY = 'WEEKLY';
    case MONTHLY = 'MONTHLY';

    public function getLabel(): string
    {
        return match ($this) {
            self::WEEKLY => 'Semanal',
            self::MONTHLY => 'Mensal',
        };
    }
}