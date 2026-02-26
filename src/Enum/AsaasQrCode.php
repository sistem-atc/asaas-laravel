<?php

namespace SistemAtc\Asaas\Enum;

enum AsaasQrCode: string
{
    case STATIC = 'STATIC';
    case DYNAMIC = 'DYNAMIC';
    case DYNAMIC_WITH_ASAAS_ADDRESS_KEY = 'DYNAMIC_WITH_ASAAS_ADDRESS_KEY';
    case COMPOSITE = 'COMPOSITE';

    public function getLabel(): string
    {
        return match ($this) {
            self::STATIC => 'Estático',
            self::DYNAMIC => 'Dinâmico',
            self::DYNAMIC_WITH_ASAAS_ADDRESS_KEY => 'Dinâmico com Chave Pix do Asaas',
            self::COMPOSITE => 'Composto',
        };
    }
}