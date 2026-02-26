<?php

namespace SistemAtc\Asaas\Enum;

enum OriginRecurrence: string
{
    case PIX = 'PIX';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::PIX => 'PIX',
        };
    }
}