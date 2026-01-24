<?php

namespace SistemAtc\Asaas\Enum;

enum StatusMobile: string
{
    case PENDING = 'PENDING';
    case CONFIRMED = 'CONFIRMED';
    case CANCELLED = 'CANCELLED';
    case REFUNDED = 'REFUNDED';
    case WAITING_CRITICAL_ACTION = 'WAITING_CRITICAL_ACTION';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::CONFIRMED => 'Confirmado',
            self::CANCELLED => 'Cancelado',
            self::REFUNDED => 'Estornado',
            self::WAITING_CRITICAL_ACTION => 'Aguardando Ação Critica',
        };
    }
}
