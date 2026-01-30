<?php

namespace SistemAtc\Asaas\Enum;

enum TypeDocument: string
{
    case ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT = 'ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT';
    case ASAAS_ACCOUNT_OWNER_EMANCIPATION_AGE = 'ASAAS_ACCOUNT_OWNER_EMANCIPATION_AGE';
    case ASAAS_ACCOUNT_OWNER = 'ASAAS_ACCOUNT_OWNER';
    case ASSOCIATION = 'ASSOCIATION';
    case BANK_ACCOUNT_OWNER_EMANCIPATION_AGEX = 'BANK_ACCOUNT_OWNER_EMANCIPATION_AGE';
    case BANK_ACCOUNT_OWNER = 'BANK_ACCOUNT_OWNER';
    case CUSTOM = 'CUSTOM';
    case DIRECTOR = 'DIRECTOR';
    case INDIVIDUAL_COMPANY = 'INDIVIDUAL_COMPANY';
    case LIMITED_COMPANY = 'LIMITED_COMPANY';
    case MEI = 'MEI';
    case PARTNER = 'PARTNER';
    case POWER_OF_ATTORNEY = 'POWER_OF_ATTORNEY';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT => 'Extrato para depósito em conta bancária',
            self::ASAAS_ACCOUNT_OWNER_EMANCIPATION_AGE => 'Idade de emancipação do titular da conta Asaas',
            self::ASAAS_ACCOUNT_OWNER => 'Titular da conta Asaas',
            self::ASSOCIATION => 'Associação',
            self::BANK_ACCOUNT_OWNER_EMANCIPATION_AGEX => 'Idade de emancipação do titular da conta bancária',
            self::BANK_ACCOUNT_OWNER => 'Titular da conta bancária',
            self::CUSTOM => 'Personalizado',
            self::DIRECTOR => 'Diretor',
            self::INDIVIDUAL_COMPANY => 'Empresa individual',
            self::LIMITED_COMPANY => 'Sociedade limitada (LTDA)',
            self::MEI => 'Microempreendedor Individual',
            self::PARTNER => 'Sócio',
            self::POWER_OF_ATTORNEY => 'Procuração',
        };
    }
}
