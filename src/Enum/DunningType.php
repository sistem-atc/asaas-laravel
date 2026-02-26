<?php

namespace SistemAtc\Asaas\Enum;

enum DunningType: string
{
    case CREDIT_BUREAU = 'CREDIT_BUREAU';
    case DEBT_RECOVERY_ASSISTANCE = 'DEBT_RECOVERY_ASSISTANCE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CREDIT_BUREAU  => 'Bureau de Crédito',
            self::DEBT_RECOVERY_ASSISTANCE  => 'Assistencia para Recuperação de Dividas',
        };
    }
}