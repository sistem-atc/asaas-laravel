<?php

namespace SistemAtc\Asaas\Enum;

enum General: string
{
    case PENDING = 'PENDING';
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';
    case AWAITING_APPROVAL = 'AWAITING_APPROVAL';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::AWAITING_APPROVAL => 'Aguardando Aprovação',
        };
    }
}
