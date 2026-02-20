<?php

namespace SistemAtc\Asaas\Enum;

enum StatusTransfer: string
{
    case PENDING = 'PENDING';
    case BANK_PROCESSING = 'BANK_PROCESSING';
    case DONE = 'DONE';
    case CANCELLED = 'CANCELLED';
    case FAILED = 'FAILED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::BANK_PROCESSING => 'Em Processamento pelo Banco',
            self::DONE => 'Finalizado',
            self::CANCELLED => 'Cancelado',
            self::FAILED => 'Falhou',
        };
    }
}
