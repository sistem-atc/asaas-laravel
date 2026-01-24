<?php

namespace SistemAtc\Asaas\Enum;

enum InvoiceStatus: string
{
    case SCHEDULED = 'SCHEDULED';
    case AUTHORIZED = 'AUTHORIZED';
    case PROCESSING_CANCELLATION = 'PROCESSING_CANCELLATION';
    case CANCELED = 'CANCELED';
    case CANCELLATION_DENIED = 'CANCELLATION_DENIED';
    case ERROR = 'ERROR';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SCHEDULED => 'Agendada',
            self::AUTHORIZED => 'Autorizada',
            self::PROCESSING_CANCELLATION => 'Cancelamento em Processamento',
            self::CANCELED => 'Cancelada',
            self::CANCELLATION_DENIED => 'Cancelamento Negado',
            self::ERROR => 'Erro',
        };
    }
}
