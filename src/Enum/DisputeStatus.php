<?php

namespace SistemAtc\Asaas\Enum;

enum DisputeStatus: string
{
    case REQUESTED = 'REQUESTED';
    case ACCEPTED = 'ACCEPTED';
    case REJECTED = 'REJECTED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::REQUESTED  => 'Solicitado',
            self::ACCEPTED   => 'Aceito',
            self::REJECTED   => 'Rejeitado',
        };
    }
}