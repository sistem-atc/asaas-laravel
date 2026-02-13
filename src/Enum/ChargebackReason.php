<?php

namespace SistemAtc\Asaas\Enum;

enum ChargebackReason: string
{
    case ABSENCE_OF_PRINT = 'ABSENCE_OF_PRINT';
    case ABSENT_CARD_FRAUD = 'ABSENT_CARD_FRAUD';
    case CARD_ACTIVATED_PHONE_TRANSACTION = 'CARD_ACTIVATED_PHONE_TRANSACTION';
    case CARD_FRAUD = 'CARD_FRAUD';
    case CARD_RECOVERY_BULLETIN = 'CARD_RECOVERY_BULLETIN';
    case COMMERCIAL_DISAGREEMENT = 'COMMERCIAL_DISAGREEMENT';
    case COPY_NOT_RECEIVED = 'COPY_NOT_RECEIVED';
    case CREDIT_OR_DEBIT_PRESENTATION_ERROR = 'CREDIT_OR_DEBIT_PRESENTATION_ERROR';
    case DIFFERENT_PAY_METHOD = 'DIFFERENT_PAY_METHOD';
    case FRAUD = 'FRAUD';
    case INCORRECT_TRANSACTION_VALUE = 'INCORRECT_TRANSACTION_VALUE';
    case INVALID_CURRENCY = 'INVALID_CURRENCY';
    case INVALID_DATA = 'INVALID_DATA';
    case LATE_PRESENTATION = 'LATE_PRESENTATION';
    case LOCAL_REGULATORY_OR_LEGAL_DISPUTE = 'LOCAL_REGULATORY_OR_LEGAL_DISPUTE';
    case MULTIPLE_ROCS = 'MULTIPLE_ROCS';
    case ORIGINAL_CREDIT_TRANSACTION_NOT_ACCEPTED = 'ORIGINAL_CREDIT_TRANSACTION_NOT_ACCEPTED';
    case OTHER_ABSENT_CARD_FRAUD = 'OTHER_ABSENT_CARD_FRAUD';
    case PROCESS_ERROR = 'PROCESS_ERROR';
    case RECEIVED_COPY_ILLEGIBLE_OR_INCOMPLETE = 'RECEIVED_COPY_ILLEGIBLE_OR_INCOMPLETE';
    case RECURRENCE_CANCELED = 'RECURRENCE_CANCELED';
    case REQUIRED_AUTHORIZATION_NOT_GRANTED = 'REQUIRED_AUTHORIZATION_NOT_GRANTED';
    case RIGHT_OF_FULL_RECOURSE_FOR_FRAUD = 'RIGHT_OF_FULL_RECOURSE_FOR_FRAUD';
    case SALE_CANCELED = 'SALE_CANCELED';
    case SERVICE_DISAGREEMENT_OR_DEFECTIVE_PRODUCT = 'SERVICE_DISAGREEMENT_OR_DEFECTIVE_PRODUCT';
    case SERVICE_NOT_RECEIVED = 'SERVICE_NOT_RECEIVED';
    case SPLIT_SALE = 'SPLIT_SALE';
    case TRANSFERS_OF_DIVERSE_RESPONSIBILITIES = 'TRANSFERS_OF_DIVERSE_RESPONSIBILITIES';
    case UNQUALIFIED_CAR_RENTAL_DEBIT = 'UNQUALIFIED_CAR_RENTAL_DEBIT';
    case USA_CARDHOLDER_DISPUTE = 'USA_CARDHOLDER_DISPUTE';
    case VISA_FRAUD_MONITORING_PROGRAM = 'VISA_FRAUD_MONITORING_PROGRAM';
    case WARNING_BULLETIN_FILE = 'WARNING_BULLETIN_FILE';

    public function getLabel(): string
    {
        return match ($this) {
            self::ABSENCE_OF_PRINT => 'Ausência de Assinatura/Impressão',
            self::ABSENT_CARD_FRAUD => 'Fraude de Cartão Não Presente',
            self::CARD_ACTIVATED_PHONE_TRANSACTION => 'Transação Telefônica com Cartão Ativado',
            self::CARD_FRAUD => 'Fraude de Cartão',
            self::CARD_RECOVERY_BULLETIN => 'Boletim de Recuperação de Cartão',
            self::COMMERCIAL_DISAGREEMENT => 'Desacordo Comercial',
            self::COPY_NOT_RECEIVED => 'Cópia Não Recebida',
            self::CREDIT_OR_DEBIT_PRESENTATION_ERROR => 'Erro de Apresentação de Crédito ou Débito',
            self::DIFFERENT_PAY_METHOD => 'Pago por Outro Meio',
            self::FRAUD => 'Fraude',
            self::INCORRECT_TRANSACTION_VALUE => 'Valor da Transação Incorreto',
            self::INVALID_CURRENCY => 'Moeda Inválida',
            self::INVALID_DATA => 'Dados Inválidos',
            self::LATE_PRESENTATION => 'Apresentação Fora do Prazo',
            self::LOCAL_REGULATORY_OR_LEGAL_DISPUTE => 'Disputa Legal ou Regulatória Local',
            self::MULTIPLE_ROCS => 'Múltiplos Registros de Venda (ROCs)',
            self::ORIGINAL_CREDIT_TRANSACTION_NOT_ACCEPTED => 'Transação de Crédito Original Não Aceita',
            self::OTHER_ABSENT_CARD_FRAUD => 'Outras Fraudes de Cartão Não Presente',
            self::PROCESS_ERROR => 'Erro de Processamento',
            self::RECEIVED_COPY_ILLEGIBLE_OR_INCOMPLETE => 'Cópia Recebida Ilegível ou Incompleta',
            self::RECURRENCE_CANCELED => 'Recorrência Cancelada',
            self::REQUIRED_AUTHORIZATION_NOT_GRANTED => 'Autorização Necessária Não Concedida',
            self::RIGHT_OF_FULL_RECOURSE_FOR_FRAUD => 'Direito de Recurso Total por Fraude',
            self::SALE_CANCELED => 'Venda Cancelada',
            self::SERVICE_DISAGREEMENT_OR_DEFECTIVE_PRODUCT => 'Desacordo de Serviço ou Produto Defeituoso',
            self::SERVICE_NOT_RECEIVED => 'Serviço Não Recebido',
            self::SPLIT_SALE => 'Venda Fracionada (Split Sale)',
            self::TRANSFERS_OF_DIVERSE_RESPONSIBILITIES => 'Transferência de Diversas Responsabilidades',
            self::UNQUALIFIED_CAR_RENTAL_DEBIT => 'Débito de Aluguel de Carro Não Qualificado',
            self::USA_CARDHOLDER_DISPUTE => 'Disputa de Portador de Cartão (EUA)',
            self::VISA_FRAUD_MONITORING_PROGRAM => 'Programa de Monitoramento de Fraude Visa',
            self::WARNING_BULLETIN_FILE => 'Arquivo de Boletim de Alerta',
        };
    }
}