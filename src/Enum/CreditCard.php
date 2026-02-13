<?php

namespace SistemAtc\Asaas\Enum;

enum CreditCard: string
{

    case VISA = 'VISA';
    case MASTERCARD = 'MASTERCARD';
    case ELO = 'ELO';
    case DINERS = 'DINERS';
    case DISCOVER = 'DISCOVER';
    case AMEX = 'AMEX';
    case CABAL = 'CABAL';
    case BANESCARD = 'BANESCARD';
    case CREDZ = 'CREDZ';
    case SOROCRED = 'SOROCRED';
    case CREDSYSTEM = 'CREDSYSTEM';
    case JCB = 'JCB';
    case UNKNOWN = 'UNKNOWN';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::VISA => 'Visa',
            self::MASTERCARD => 'Mastercard',
            self::ELO => 'Elo',
            self::DINERS => 'Diners',
            self::DISCOVER => 'Discover',
            self::AMEX => 'Amex',
            self::CABAL => 'Cabal',
            self::BANESCARD => 'Banescard',
            self::CREDZ => 'Credz',
            self::SOROCRED => 'Sorocred',
            self::CREDSYSTEM => 'Credsystem',
            self::JCB => 'Jcb',
            self::UNKNOWN => 'Desconhecido',
        };
    }
}
