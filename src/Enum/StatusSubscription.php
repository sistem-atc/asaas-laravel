<?php

namespace SistemAtc\Asaas\Enum;

enum StatusSubscription: string
{
    case ACTIVE = 'ACTIVE';
    case EXPIRED = 'EXPIRED';
    case INACTIVE = 'INACTIVE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Ativo',
            self::EXPIRED => 'Expirado',
            self::INACTIVE => 'Inativo',
        };
    }
}
