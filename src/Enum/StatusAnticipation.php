<?php

namespace SistemAtc\Asaas\Enum;

enum StatusAnticipation: string
{
    case PENDING = 'PENDING';
    case DENIED = 'DENIED';
    case CREDITED = 'CREDITED';
    case DEBITED = 'DEBITED';
    case CANCELED = 'CANCELED';
    case OVERDUE = 'OVERDUE';
    case SCHEDULED = 'SCHEDULED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::DENIED => 'Negado',
            self::CREDITED => 'Creditado',
            self::DEBITED => 'Debitado',
            self::CANCELED => 'Cancelado',
            self::OVERDUE => 'Vencido',
            self::SCHEDULED => 'Agendado',
        };
    }
}