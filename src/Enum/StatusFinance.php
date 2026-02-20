<?php

namespace SistemAtc\Asaas\Enum;

enum StatusFinance: string
{
    case PENDING = 'PENDING';
    case RECEIVED = 'RECEIVED';
    case CONFIRMED = 'CONFIRMED';
    case OVERDUE = 'OVERDUE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::RECEIVED => 'Recebido',
            self::CONFIRMED => 'Confirmado',
            self::OVERDUE => 'Vencido',
        };
    }
}
