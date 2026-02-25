<?php

namespace SistemAtc\Asaas\Enum;

enum DocumentType: string
{
    case INVOICE = 'INVOICE';
    case CONTRACT = 'CONTRACT';
    case MEDIA = 'MEDIA';
    case DOCUMENT = 'DOCUMENT';
    case SPREADSHEET = 'SPREADSHEET';
    case PROGRAM = 'PROGRAM';
    case OTHER = 'OTHERMEDIA';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::INVOICE     => 'Nota Fiscal',
            self::CONTRACT    => 'Contrato',
            self::MEDIA       => 'Mídia (Foto/Vídeo)',
            self::DOCUMENT    => 'Documento de Identificação',
            self::SPREADSHEET => 'Planilha',
            self::PROGRAM     => 'Software/Programa',
            self::OTHER       => 'Outros',
        };
    }
}