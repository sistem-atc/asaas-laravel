<?php

namespace SistemAtc\Asaas\Enum;

enum ChargebackStatus: string
{
    case REQUESTED = 'REQUESTED';
    case IN_DISPUTE = 'IN_DISPUTE';
    case DISPUTE_LOST = 'DISPUTE_LOST';
    case REVERSED = 'REVERSED';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::REQUESTED    => 'Solicitado',
            self::IN_DISPUTE   => 'Em disputa',
            self::DISPUTE_LOST => 'Disputa Perdida',
            self::REVERSED     => 'Revertido',
            self::DONE         => 'Finalizado',
        };
    }
}