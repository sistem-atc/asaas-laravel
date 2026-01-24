<?php

namespace SistemAtc\Asaas\Enum;

enum CommercialInfo: string
{
    case REJECTED = 'REJECTED';
    case APPROVED = 'APPROVED';
    case AWAITING_APPROVAL = 'AWAITING_APPROVAL';
    case PENDING = 'PENDING';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::REJECTED => 'Rejeitado',
            self::APPROVED => 'Aprovado',
            self::AWAITING_APPROVAL => 'Aguardando Aprovaçaõ',
            self::PENDING => 'Pendente',
        };
    }
}
