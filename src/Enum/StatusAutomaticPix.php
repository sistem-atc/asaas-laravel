<?php

namespace SistemAtc\Asaas\Enum;

enum StatusAutomaticPix: string
{
    case CREATED = 'CREATED';
    case ACTIVE = 'ACTIVE';
    case CANCELLED = 'CANCELLED';
    case REFUSED = 'REFUSED';
    case EXPIRED = 'EXPIRED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CREATED => 'Criado',
            self::ACTIVE => 'Ativo',
            self::CANCELLED => 'Cancelada',
            self::REFUSED => 'Recusado',
            self::EXPIRED => 'Expirado',
        };
    }
}
