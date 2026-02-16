<?php

namespace SistemAtc\Asaas\Enum;

enum CycleSubscription: string
{
    case WEEKLY = 'WEEKLY';
    case BIWEEKLY = 'BIWEEKLY';
    case MONTHLY = 'MONTHLY';
    case BIMONTHLY = 'BIMONTHLY';
    case QUARTERLY = 'QUARTERLY';
    case SEMIANNUALLY = 'SEMIANNUALLY';
    case YEARLY = 'YEARLY';

    public function getLabel(): string
    {
        return match ($this) {
            self::WEEKLY => 'Semanal',
            self::BIWEEKLY => 'Bi-Semanal',
            self::MONTHLY => 'Mensal',
            self::BIMONTHLY => 'Bi-Mensal',
            self::QUARTERLY => 'Quarter',
            self::SEMIANNUALLY => 'Semestral',
            self::YEARLY => 'Anual',
        };
    }
}