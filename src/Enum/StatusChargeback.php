<?php

namespace SistemAtc\Asaas\Enum;

enum StatusChargeback: string
{

    case REQUESTED = 'Requested';
    case IN_DISPUTE = 'In Dispute';
    case DISPUTE_LOST = 'Dispute Lost';
    case REVERSED = 'Reversed';
    case DONE = 'Done';

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
