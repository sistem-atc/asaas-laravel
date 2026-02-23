<?php

namespace SistemAtc\Asaas\Enum;

enum OperationType: string
{
    case PIX = 'PIX';
    case TED = 'TED';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::PIX => 'PIX',
            self::TED => 'TED',
        };
    }
}