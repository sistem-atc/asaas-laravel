<?php

namespace SistemAtc\Asaas\Enum;

enum StatusRefund: string
{
    case PENDING = 'PENDING';
    case AWAITING_CRITICAL_ACTION_AUTHORIZATION = 'AWAITING_CRITICAL_ACTION_AUTHORIZATION';
    case AWAITING_CUSTOMER_EXTERNAL_AUTHORIZATION = 'AWAITING_CUSTOMER_EXTERNAL_AUTHORIZATION';
    case CANCELLED = 'CANCELLED';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::AWAITING_CRITICAL_ACTION_AUTHORIZATION => 'Aguardando Autorização de Ação Crítica',
            self::AWAITING_CUSTOMER_EXTERNAL_AUTHORIZATION => 'Aguardando Autorização Externa do Cliente',
            self::CANCELLED => 'Cancelada',
            self::DONE => 'Concluída',
        };
    }
}
