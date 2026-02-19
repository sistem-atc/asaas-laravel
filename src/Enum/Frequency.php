<?php

namespace SistemAtc\Asaas\Enum;

enum Frequency: string
{
    case WEEKLY = 'WEEKLY';
    case MONTHLY = 'MONTHLY';
    case QUARTERLY = 'QUARTERLY';
    case SEMIANNUALLY = 'SEMIANNUALLY';
    case ANNUALLY = 'ANNUALLY';

    public function getLabel(): string
    {
        return match ($this) {
            self::WEEKLY => 'Semanal',
            self::MONTHLY => 'Mensal',
            self::QUARTERLY => 'Quarter',
            self::SEMIANNUALLY => 'Semestral',
            self::ANNUALLY => 'Anual',
        };
    }
}