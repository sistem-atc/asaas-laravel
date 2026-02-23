<?php

namespace SistemAtc\Asaas\Enum;

enum BankAccountType: string
{
    case CONTA_CORRENTE = 'CONTA_CORRENTE';
    case CONTA_POUPANCA = 'CONTA_POUPANCA';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CONTA_CORRENTE => 'Conta Corrente',
            self::CONTA_POUPANCA => 'Conta Poupança',
        };
    }
}
