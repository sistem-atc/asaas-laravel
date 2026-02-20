<?php

namespace SistemAtc\Asaas\Enum;

enum EventNotification: string
{
    case PAYMENT_CREATED = 'PAYMENT_CREATED';
    case PAYMENT_UPDATED = 'PAYMENT_UPDATED';
    case PAYMENT_RECEIVED = 'PAYMENT_RECEIVED';
    case PAYMENT_OVERDUE = 'PAYMENT_OVERDUE';
    case PAYMENT_DUEDATE_WARNING = 'PAYMENT_DUEDATE_WARNING';
    case SEND_LINHA_DIGITAVEL = 'SEND_LINHA_DIGITAVEL';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PAYMENT_CREATED => 'Pagamento Criado',
            self::PAYMENT_UPDATED => 'Pagamento Alterado',
            self::PAYMENT_RECEIVED => 'Pagamento Recebido',
            self::PAYMENT_OVERDUE => 'Pagamento Vencido',
            self::PAYMENT_DUEDATE_WARNING => 'Aviso de Vencimento Proximo',
            self::SEND_LINHA_DIGITAVEL => 'Linha Digitável Enviada',
        };
    }
}
