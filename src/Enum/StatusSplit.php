<?php

namespace SistemAtc\Asaas\Enum;

enum StatusSplit: string
{
    case PENDING = 'PENDING';
    case PROCESSING = 'PROCESSING';
    case PROCESSING_REFUND = 'PROCESSING_REFUND';
    case AWAITING_CREDIT = 'AWAITING_CREDIT';
    case CANCELLED = 'CANCELLED';
    case DONE = 'DONE';
    case REFUNDED = 'REFUNDED';
    case BLOCKED_BY_VALUE_DIVERGENCE = 'BLOCKED_BY_VALUE_DIVERGENCE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::PROCESSING => 'Em Processamento',
            self::PROCESSING_REFUND => 'Estorno em Processamento',
            self::AWAITING_CREDIT => 'Aguardando Crédito',
            self::CANCELLED => 'Cancelado',
            self::DONE => 'Concluído',
            self::REFUNDED => 'Estornado',
            self::BLOCKED_BY_VALUE_DIVERGENCE => 'Bloqueado por Divergência de Valor',
        };
    }
}
