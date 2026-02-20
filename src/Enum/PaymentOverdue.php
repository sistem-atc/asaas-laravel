<?php

namespace SistemAtc\Asaas\Enum;

enum PaymentOverdue: int
{
    case NO_DELAY = 0;
    case ONE_DAY = 1;
    case FIVE_DAYS = 5;
    case SEVEN_DAYS = 7;
    case TEN_DAYS = 10;
    case FIFTEEN_DAYS = 15;
    case THIRTY_DAYS = 30;

    public function getLabel(): string
    {
        return match ($this) {
            self::NO_DELAY => 'No dia do vencimento',
            self::ONE_DAY => '1 dia de atraso',
            self::FIVE_DAYS => '5 dias de atraso',
            self::SEVEN_DAYS => '7 dias de atraso',
            self::TEN_DAYS => '10 dias de atraso',
            self::FIFTEEN_DAYS => '15 dias de atraso',
            self::THIRTY_DAYS => '30 dias de atraso',
        };
    }
}
