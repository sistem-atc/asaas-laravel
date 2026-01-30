<?php

namespace SistemAtc\Asaas\Enum;

enum StatusDocument: string
{
    case NOT_SENT = 'NOT_SENT';
    case PENDING = 'PENDING';
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';
    case IGNORED = 'IGNORED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NOT_SENT => 'Não Enviado',
            self::PENDING => 'Pendente',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::IGNORED => 'Ignorado',
        };
    }
}