<?php

namespace SistemAtc\Asaas\Enum;

enum FormatQrCode: string
{
    case ALL = 'ALL';
    case IMAGE = 'IMAGE';
    case PAYLOAD = 'PAYLOAD';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ALL  => 'Todos',
            self::IMAGE   => 'Imagem',
            self::PAYLOAD   => 'Payload',
        };
    }
}