<?php

namespace SistemAtc\Asaas\Enum;

enum StatusChargeback: string
{

    case REQUESTED = 'REQUESTED';
    case IN_DISPUTE = 'IN_DISPUTE';
    case DISPUTE_LOST = 'DISPUTE_LOST';
    case REVERSED = 'REVERSED';
    case DONE = 'DONE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::REQUESTED => 'Solicitado',
            self::IN_DISPUTE => 'Em Disputa',
            self::DISPUTE_LOST => 'Disputa Perdida',
            self::REVERSED => 'Revertida',
            self::DONE => 'Finalizada',
        };
    }
}
