<?php

namespace SistemAtc\Asaas\Enum;

enum AuthenticationType: string
{
    case CERTIFICATE = 'CERTIFICATE';
    case TOKEN = 'TOKEN';
    case USER_AND_PASSWORD = 'USER_AND_PASSWORD';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CERTIFICATE => 'Certificado',
            self::TOKEN => 'Token',
            self::USER_AND_PASSWORD => 'Usuário e senha',
        };
    }
}
