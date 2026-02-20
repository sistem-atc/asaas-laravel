<?php

namespace SistemAtc\Asaas\Enum;

enum StatusPixPayment: string
{
    case AWAITING_REQUEST = 'AWAITING_REQUEST';
    case SCHEDULED = 'SCHEDULED';
    case DONE = 'DONE';
    case CANCELLED = 'CANCELLED';
    case REFUSED = 'REFUSED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AWAITING_REQUEST => 'Aguardando Requisição',
            self::SCHEDULED => 'Agendado',
            self::DONE => 'Finalizado',
            self::CANCELLED => 'Cancelado',
            self::REFUSED => 'Recusado',
        };
    }
}
