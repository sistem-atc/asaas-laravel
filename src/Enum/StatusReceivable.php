<?php

namespace SistemAtc\Asaas\Enum;

enum StatusReceivable: string
{
    case PENDING = 'PENDING';
    case DENIED = 'DENIED';
    case CREDITED = 'CREDITED';
    case DEBITED = 'DEBITED';
    case CANCELLED = 'CANCELLED';
    case OVERDUE = 'OVERDUE';
    case SCHEDULED = 'SCHEDULED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::DENIED => 'Negado',
            self::CREDITED => 'Creditado',
            self::DEBITED => 'Debitado',
            self::CANCELLED => 'Cancelado',
            self::OVERDUE => 'Vencido',
            self::SCHEDULED => 'Agendado',
        };
    }
}
