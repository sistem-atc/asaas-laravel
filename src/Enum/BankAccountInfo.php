<?php

namespace SistemAtc\Asaas\Enum;

enum BankAccountInfo: string
{
    case PENDING = 'PENDING';
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
        };
    }
}
