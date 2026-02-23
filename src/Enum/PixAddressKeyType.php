<?php

namespace SistemAtc\Asaas\Enum;

enum PixAddressKeyType: string
{
    case EVP = 'EVP';
    case CPF = 'CPF';
    case CNPJ = 'CNPJ';
    case EMAIL = 'EMAIL';
    case PHONE = 'PHONE';

    public function getLabel(): string
    {
        return match ($this) {
            self::EVP => 'Chave Aleatória',
            self::CPF => 'CPF',
            self::CNPJ => 'CNPJ',
            self::EMAIL => 'E-mail',
            self::PHONE => 'Telefone',
        };
    }
}