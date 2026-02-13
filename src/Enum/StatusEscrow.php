<?php

namespace SistemAtc\Asaas\Enum;

enum StatusEscrow: string
{
    case ACTIVE = 'ACTIVE';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Ativo',
            self::DONE => 'Finalizada',
        };
    }
}
