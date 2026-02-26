<?php

namespace SistemAtc\Asaas\Enum;

enum StatusRecurrencesItems: string
{
    case PENDING = 'PENDING';
    case CANCELLED = 'CANCELLED';
    case REFUSED = 'REFUSED';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::CANCELLED => 'Cancelado',
            self::REFUSED => 'Recusado',
            self::DONE => 'Finalizado',
        };
    }
}