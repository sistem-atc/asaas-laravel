<?php

namespace SistemAtc\Asaas\Enum;

enum TransferType: string
{
    case PIX = 'PIX';
    case TED = 'TED';
    case INTERNAL = 'INTERNAL';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PIX => 'Pix',
            self::TED => 'Ted',
            self::INTERNAL => 'Interno',
        };
    }
}
