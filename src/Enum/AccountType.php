<?php

namespace SistemAtc\Asaas\Enum;

enum AccountType: string
{
    case CHECKING_ACCOUNT = 'CHECKING_ACCOUNT';
    case SALARY_ACCOUNT = 'SALARY_ACCOUNT';
    case INVESTIMENT_ACCOUNT = 'INVESTIMENT_ACCOUNT';
    case PAYMENT_ACCOUNT = 'PAYMENT_ACCOUNT';

    public function getLabel(): string
    {
        return match ($this) {
            self::CHECKING_ACCOUNT => 'Conta Corrente',
            self::SALARY_ACCOUNT => 'Conta Salário',
            self::INVESTIMENT_ACCOUNT => 'Conta de Investimento',
            self::PAYMENT_ACCOUNT => 'Conta de Pagamento',
        };
    }
}