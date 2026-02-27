<?php

namespace SistemAtc\Asaas\Enum;

enum InvoiceChargeStatus: string
{
    case SCHEDULED = 'SCHEDULED';
    case WAITING_OVERDUE_PAYMENT = 'WAITING_OVERDUE_PAYMENT';
    case PENDING = 'PENDING';
    case SYNCHRONIZED = 'SYNCHRONIZED';
    case AUTHORIZED = 'AUTHORIZED';
    case PROCESSING_CANCELLATION = 'PROCESSING_CANCELLATION';
    case CANCELLED = 'CANCELLED';
    case CANCELLATION_DENIED = 'CANCELLATION_DENIED';
    case ERROR = 'ERROR';
    case NONE = 'NONE';
    case CANCELED = 'CANCELED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SCHEDULED => 'Agendada',
            self::WAITING_OVERDUE_PAYMENT => 'Aguardando data de vencimento',
            self::PENDING => 'Pendente',
            self::SYNCHRONIZED => 'Sincronizada',
            self::AUTHORIZED => 'Autorizada',
            self::PROCESSING_CANCELLATION => 'Cancelamento em Processamento',
            self::CANCELLED => 'Cancelada',
            self::CANCELLATION_DENIED => 'Cancelamento Negado',
            self::ERROR => 'Erro',
            self::NONE => 'Nada',
            self::CANCELED => 'Cancelada',
        };
    }
}
