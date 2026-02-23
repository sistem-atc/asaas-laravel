<?php

namespace SistemAtc\Asaas\Enum;

enum StatusSplitSubscription: string
{
    case ACTIVE = 'ACTIVE';
    case DISABLED = 'DISABLED';
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Ativo',
            self::DISABLED => 'Desabilitado',
        };
    }
}
