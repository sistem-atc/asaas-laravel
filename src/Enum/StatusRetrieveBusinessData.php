<?php

namespace SistemAtc\Asaas\Enum;

enum StatusRetrieveBusinessData: string
{
    case APPROVED = 'APPROVED';
    case AWAITING_ACTION_AUTHORIZATION = 'AWAITING_ACTION_AUTHORIZATION';
    case DENIED = 'DENIED';
    case PENDING = 'PENDING';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::APPROVED => 'Aprovado',
            self::AWAITING_ACTION_AUTHORIZATION => 'Aguardando Autorização de Ação',
            self::DENIED => 'Negado',
            self::PENDING => 'Pendente',
        };
    }
}
