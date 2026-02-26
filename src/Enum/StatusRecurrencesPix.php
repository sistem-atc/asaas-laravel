<?php

namespace SistemAtc\Asaas\Enum;

enum StatusRecurrencesPix: string
{
    case AWAITING_CRITICAL_ACTION_AUTHORIZATION = 'AWAITING_CRITICAL_ACTION_AUTHORIZATION';
    case PENDING = 'PENDING';
    case SCHEDULED = 'SCHEDULED';
    case CANCELLED = 'CANCELLED';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AWAITING_CRITICAL_ACTION_AUTHORIZATION => 'Aguardando autorização de ação crítica',
            self::PENDING => 'Pendente',
            self::SCHEDULED => 'Agendado',
            self::CANCELLED => 'Cancelado',
            self::DONE => 'Finalizado',
        };
    }
}