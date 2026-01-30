<?php

namespace SistemAtc\Asaas\Enum;

enum TypePendingDocument: string
{
    case ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT = 'ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT';
    case CUSTOM = 'CUSTOM';
    case EMANCIPATION_OF_MINORS = 'EMANCIPATION_OF_MINORS';
    case ENTREPRENEUR_REQUIREMENT = 'ENTREPRENEUR_REQUIREMENT';
    case IDENTIFICATION_SELFIE = 'IDENTIFICATION_SELFIE';
    case IDENTIFICATION = 'IDENTIFICATION';
    case INVOICE = 'INVOICE';
    case MEI_CERTIFICATE = 'MEI_CERTIFICATE';
    case MINUTES_OF_CONSTITUTION = 'MINUTES_OF_CONSTITUTION';
    case MINUTES_OF_ELECTION = 'MINUTES_OF_ELECTION';
    case POWER_OF_ATTORNEY = 'POWER_OF_ATTORNEY';
    case SOCIAL_CONTRACT = 'SOCIAL_CONTRACT';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ALLOW_BANK_ACCOUNT_DEPOSIT_STATEMENT => 'Extrato para depósito em conta bancária',
            self::CUSTOM => 'Personalizado',
            self::EMANCIPATION_OF_MINORS => 'Emancipação de menor',
            self::ENTREPRENEUR_REQUIREMENT => 'Requerimento de empresário',
            self::IDENTIFICATION_SELFIE => 'Selfie com documento',
            self::IDENTIFICATION => 'Documento de identificação',
            self::INVOICE => 'Nota fiscal',
            self::MEI_CERTIFICATE => 'Certificado de MEI',
            self::MINUTES_OF_CONSTITUTION => 'Ata de constituição',
            self::MINUTES_OF_ELECTION => 'Ata de eleição',
            self::POWER_OF_ATTORNEY => 'Procuração',
            self::SOCIAL_CONTRACT => 'Contrato social',
        };
    }
}
