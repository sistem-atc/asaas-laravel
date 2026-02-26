<?php

namespace SistemAtc\Asaas\Enum;

enum StatusDunning: string
{
    case PENDING = 'PENDING';
    case AWAITING_APPROVAL = 'AWAITING_APPROVAL';
    case AWAITING_CANCELLATION = 'AWAITING_CANCELLATION';
    case PROCESSED = 'PROCESSED';
    case PAID = 'PAID';
    case PARTIALLY_PAID = 'PARTIALLY_PAID';
    case DENIED = 'DENIED';
    case CANCELLED = 'CANCELLED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::AWAITING_APPROVAL => 'Aguardando Aprovação',
            self::AWAITING_CANCELLATION => 'Aguardando Cancelamento',
            self::PROCESSED => 'Processado',
            self::PAID => 'Pago',
            self::PARTIALLY_PAID => 'Pago Parcialmente',
            self::DENIED => 'Negado',
            self::CANCELLED => 'Cancelado',
        };
    }
}
