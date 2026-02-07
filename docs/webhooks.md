# 🪝 Sistema de Webhooks

O sistema de webhooks deste pacote é completo e robusto, suportando **mais de 100 eventos** diferentes do Asaas com processamento assíncrono, idempotência e validação de segurança.

## 📋 Índice

- [Como Funciona](#como-funciona)
- [Configuração](#configuração)
- [Eventos Disponíveis](#eventos-disponíveis)
- [Criando Listeners](#criando-listeners)
- [Sistema de Idempotência](#sistema-de-idempotência)
- [Segurança](#segurança)
- [Exemplos Práticos](#exemplos-práticos)

## 🔄 Como Funciona

### Fluxo de Processamento

1. **Recebimento**: O Asaas envia um webhook para a URL configurada
2. **Validação**: O middleware `AsaasTokenValid` valida o token de segurança
3. **Validação de Payload**: O controller valida tamanho e conteúdo do payload
4. **Dispatch de Job**: O payload é enviado para processamento assíncrono via `ProcessAsaasWebhook`
5. **Idempotência**: Verifica se o evento já foi processado
6. **Mapeamento**: O sistema mapeia o evento para o handler correspondente
7. **Dispatch de Event**: Dispara o evento Laravel correspondente
8. **Execução do Handler**: Executa o método específico do handler

### Arquitetura

```
Asaas → Webhook Endpoint → Middleware (Validação) → Controller → Job (Assíncrono)
                                                                    ↓
                                                              Idempotência Check
                                                                    ↓
                                                              Mapeamento de Evento
                                                                    ↓
                                                              Handler Específico
                                                                    ↓
                                                              Event Laravel
                                                                    ↓
                                                              Seus Listeners
```

## ⚙️ Configuração

### 1. Configurar Variáveis de Ambiente

Adicione ao seu `.env`:

```env
# Token de segurança para validação de webhooks
ASAAS_WEBHOOK_TOKEN=seu-token-secreto-aqui

# TTL para idempotência (em segundos, padrão: 86400 = 24 horas)
ASAAS_IDEMPOTENCY_TTL=86400

# Rota personalizada (opcional, padrão: /asaas-events)
ASAAS_ROUTE_EVENTS=/asaas-events
```

### 2. Configurar URL no Painel Asaas

No painel do Asaas, configure a URL do webhook:

```
https://seudominio.com.br/api/asaas-events
```

**Importante**: A URL deve ser acessível publicamente e usar HTTPS em produção.

### 3. Desabilitar Segurança (Apenas para Desenvolvimento)

⚠️ **Não recomendado para produção!**

Se precisar desabilitar a validação de token (apenas para testes locais):

```php
// config/asaas.php
'use_webhook_security' => false,
```

## 📊 Eventos Disponíveis

O sistema suporta **102 eventos** diferentes, organizados por categoria:

### 💰 Eventos de Pagamento (Payment)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `PAYMENT_CREATED` | Cobrança criada | `PaymentHandler::created()` |
| `PAYMENT_AWAITING_RISK_ANALYSIS` | Aguardando análise de risco | `PaymentHandler::awaitingRiskAnalysis()` |
| `PAYMENT_APPROVED_BY_RISK_ANALYSIS` | Aprovado por análise de risco | `PaymentHandler::approvedByRiskAnalysis()` |
| `PAYMENT_REPROVED_BY_RISK_ANALYSIS` | Reprovado por análise de risco | `PaymentHandler::reprovedByRiskAnalysis()` |
| `PAYMENT_AUTHORIZED` | Pagamento autorizado | `PaymentHandler::authorized()` |
| `PAYMENT_UPDATED` | Cobrança atualizada | `PaymentHandler::updated()` |
| `PAYMENT_CONFIRMED` | Pagamento confirmado (saldo pendente) | `PaymentHandler::confirmed()` |
| `PAYMENT_RECEIVED` | Cobrança recebida | `PaymentHandler::received()` |
| `PAYMENT_CREDIT_CARD_CAPTURE_REFUSED` | Falha na captura do cartão | `PaymentHandler::creditCardCaptureRefused()` |
| `PAYMENT_ANTICIPATED` | Cobrança antecipada | `PaymentHandler::anticipated()` |
| `PAYMENT_OVERDUE` | Cobrança vencida | `PaymentHandler::overdue()` |
| `PAYMENT_DELETED` | Cobrança removida | `PaymentHandler::deleted()` |
| `PAYMENT_RESTORED` | Cobrança restaurada | `PaymentHandler::restored()` |
| `PAYMENT_REFUNDED` | Cobrança estornada | `PaymentHandler::refunded()` |
| `PAYMENT_PARTIALLY_REFUNDED` | Cobrança estornada parcialmente | `PaymentHandler::partiallyRefunded()` |
| `PAYMENT_REFUND_IN_PROGRESS` | Estorno em processamento | `PaymentHandler::refundInProgress()` |
| `PAYMENT_RECEIVED_IN_CASH_UNDONE` | Recebimento em dinheiro desfeito | `PaymentHandler::receivedInCashUndone()` |
| `PAYMENT_CHARGEBACK_REQUESTED` | Chargeback recebido | `PaymentHandler::chargebackRequested()` |
| `PAYMENT_CHARGEBACK_DISPUTE` | Em disputa de chargeback | `PaymentHandler::chargebackDispute()` |
| `PAYMENT_AWAITING_CHARGEBACK_REVERSAL` | Aguardando repasse de chargeback | `PaymentHandler::awaitingChargebackReversal()` |
| `PAYMENT_DUNNING_RECEIVED` | Recebimento de negativação | `PaymentHandler::dunningReceived()` |
| `PAYMENT_DUNNING_REQUESTED` | Requisição de negativação | `PaymentHandler::dunningRequested()` |
| `PAYMENT_BANK_SLIP_VIEWED` | Boleto visualizado | `PaymentHandler::bankSlipViewed()` |
| `PAYMENT_CHECKOUT_VIEWED` | Fatura visualizada | `PaymentHandler::checkoutViewed()` |
| `PAYMENT_SPLIT_CANCELLED` | Split de pagamento cancelado | `PaymentHandler::splitCancelled()` |
| `PAYMENT_SPLIT_DIVERGENCE_BLOCK` | Bloqueio por divergência de split | `PaymentHandler::splitDivergenceBlock()` |
| `PAYMENT_SPLIT_DIVERGENCE_BLOCK_FINISHED` | Bloqueio de split finalizado | `PaymentHandler::splitDivergenceBlockFinished()` |

### 🔄 Eventos de Assinatura (Subscription)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `SUBSCRIPTION_CREATED` | Assinatura criada | `SubscriptionHandler::created()` |
| `SUBSCRIPTION_UPDATED` | Assinatura atualizada | `SubscriptionHandler::updated()` |
| `SUBSCRIPTION_INACTIVATED` | Assinatura inativada | `SubscriptionHandler::inactivated()` |
| `SUBSCRIPTION_DELETED` | Assinatura removida | `SubscriptionHandler::deleted()` |
| `SUBSCRIPTION_SPLIT_DIVERGENCE_BLOCK` | Assinatura bloqueada por split | `SubscriptionHandler::splitDivergenceBlock()` |
| `SUBSCRIPTION_SPLIT_DIVERGENCE_BLOCK_FINISHED` | Bloqueio de split finalizado | `SubscriptionHandler::splitDivergenceBlockFinished()` |

### 📄 Eventos de Nota Fiscal (Invoice)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `INVOICE_CREATED` | Nota fiscal criada | `InvoiceHandler::created()` |
| `INVOICE_UPDATED` | Nota fiscal atualizada | `InvoiceHandler::updated()` |
| `INVOICE_SYNCHRONIZED` | Nota fiscal enviada | `InvoiceHandler::synchronized()` |
| `INVOICE_AUTHORIZED` | Nota fiscal emitida | `InvoiceHandler::authorized()` |
| `INVOICE_PROCESSING_CANCELLATION` | Cancelamento de NF em processamento | `InvoiceHandler::processingCancellation()` |
| `INVOICE_CANCELED` | Nota fiscal cancelada | `InvoiceHandler::canceled()` |
| `INVOICE_CANCELLATION_DENIED` | Cancelamento de NF recusado | `InvoiceHandler::cancellationDenied()` |
| `INVOICE_ERROR` | Nota fiscal com erro | `InvoiceHandler::error()` |

### 💸 Eventos de Transferência (Transfer)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `TRANSFER_CREATED` | Transferência criada | `TransferHandler::created()` |
| `TRANSFER_PENDING` | Transferência pendente | `TransferHandler::pending()` |
| `TRANSFER_IN_BANK_PROCESSING` | Transferência em processamento bancário | `TransferHandler::inBankProcessing()` |
| `TRANSFER_BLOCKED` | Transferência bloqueada | `TransferHandler::blocked()` |
| `TRANSFER_DONE` | Transferência realizada | `TransferHandler::done()` |
| `TRANSFER_FAILED` | Transferência falhou | `TransferHandler::failed()` |
| `TRANSFER_CANCELLED` | Transferência cancelada | `TransferHandler::cancelled()` |

### 🧾 Eventos de Conta (Bill)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `BILL_CREATED` | Pague Contas criado | `BillHandler::created()` |
| `BILL_PENDING` | Pague Contas pendente | `BillHandler::pending()` |
| `BILL_BANK_PROCESSING` | Pague Contas em processamento bancário | `BillHandler::bankProcessing()` |
| `BILL_PAID` | Pague Contas pago | `BillHandler::paid()` |
| `BILL_CANCELLED` | Pague Contas cancelado | `BillHandler::cancelled()` |
| `BILL_FAILED` | Pague Contas falhou | `BillHandler::failed()` |
| `BILL_REFUNDED` | Pague Contas estornado | `BillHandler::refunded()` |

### 📈 Eventos de Antecipação (Receivable)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `RECEIVABLE_ANTICIPATION_CANCELLED` | Antecipação cancelada | `ReceivableHandler::anticipationCancelled()` |
| `RECEIVABLE_ANTICIPATION_SCHEDULED` | Antecipação agendada | `ReceivableHandler::anticipationScheduled()` |
| `RECEIVABLE_ANTICIPATION_PENDING` | Antecipação em análise | `ReceivableHandler::anticipationPending()` |
| `RECEIVABLE_ANTICIPATION_CREDITED` | Antecipação creditada | `ReceivableHandler::anticipationCredited()` |
| `RECEIVABLE_ANTICIPATION_DEBITED` | Antecipação debitada | `ReceivableHandler::anticipationDebited()` |
| `RECEIVABLE_ANTICIPATION_DENIED` | Solicitação de antecipação negada | `ReceivableHandler::anticipationDenied()` |
| `RECEIVABLE_ANTICIPATION_OVERDUE` | Antecipação vencida | `ReceivableHandler::anticipationOverdue()` |

### 📱 Eventos de Recarga (Mobile)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `MOBILE_PHONE_RECHARGE_PENDING` | Recarga de celular pendente | `MobileHandler::phoneRechargePending()` |
| `MOBILE_PHONE_RECHARGE_CANCELLED` | Recarga de celular cancelada | `MobileHandler::phoneRechargeCancelled()` |
| `MOBILE_PHONE_RECHARGE_CONFIRMED` | Recarga de celular confirmada | `MobileHandler::phoneRechargeConfirmed()` |
| `MOBILE_PHONE_RECHARGE_REFUNDED` | Recarga de celular estornada | `MobileHandler::phoneRechargeRefunded()` |

### 🏦 Eventos de Conta (Account)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_APPROVED` | Conta bancária aprovada | `AccountHandler::statusBankAccountInfoApproved()` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_AWAITING_APPROVAL` | Conta bancária em análise | `AccountHandler::statusBankAccountInfoAwaitingApproval()` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_PENDING` | Conta bancária pendente | `AccountHandler::statusBankAccountInfoPending()` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_REJECTED` | Conta bancária reprovada | `AccountHandler::statusBankAccountInfoRejected()` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_APPROVED` | Info. comerciais aprovadas | `AccountHandler::statusCommercialInfoApproved()` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_AWAITING_APPROVAL` | Info. comerciais em análise | `AccountHandler::statusCommercialInfoAwaitingApproval()` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_PENDING` | Info. comerciais pendentes | `AccountHandler::statusCommercialInfoPending()` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_REJECTED` | Info. comerciais reprovadas | `AccountHandler::statusCommercialInfoRejected()` |
| `ACCOUNT_STATUS_DOCUMENT_APPROVED` | Documentos aprovados | `AccountHandler::statusDocumentApproved()` |
| `ACCOUNT_STATUS_DOCUMENT_AWAITING_APPROVAL` | Documentos em análise | `AccountHandler::statusDocumentAwaitingApproval()` |
| `ACCOUNT_STATUS_DOCUMENT_PENDING` | Documentos pendentes | `AccountHandler::statusDocumentPending()` |
| `ACCOUNT_STATUS_DOCUMENT_REJECTED` | Documentos reprovados | `AccountHandler::statusDocumentRejected()` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_APPROVED` | Conta aprovada | `AccountHandler::statusGeneralApprovalApproved()` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_AWAITING_APPROVAL` | Conta em análise geral | `AccountHandler::statusGeneralApprovalAwaitingApproval()` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_PENDING` | Conta pendente geral | `AccountHandler::statusGeneralApprovalPending()` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_REJECTED` | Conta reprovada geral | `AccountHandler::statusGeneralApprovalRejected()` |

### 🛒 Eventos de Checkout

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `CHECKOUT_CREATED` | Checkout criado | `CheckoutHandler::created()` |
| `CHECKOUT_CANCELED` | Checkout cancelado | `CheckoutHandler::canceled()` |
| `CHECKOUT_EXPIRED` | Checkout expirado | `CheckoutHandler::expired()` |
| `CHECKOUT_PAID` | Checkout pago | `CheckoutHandler::paid()` |

### 💰 Eventos de Saldo (Balance)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `BALANCE_VALUE_BLOCKED` | Valor bloqueado no saldo | `BalanceHandler::valueBlocked()` |
| `BALANCE_VALUE_UNBLOCKED` | Valor desbloqueado no saldo | `BalanceHandler::valueUnblocked()` |

### 🔄 Eventos de Transferência Interna (Internal)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `INTERNAL_TRANSFER_CREDIT` | Crédito de transferência interna | `InternalHandler::transferCredit()` |
| `INTERNAL_TRANSFER_DEBIT` | Débito de transferência interna | `InternalHandler::transferDebit()` |

### 🔑 Eventos de Token de Acesso (Access)

| Evento | Descrição | Handler |
|--------|-----------|---------|
| `ACCESS_TOKEN_CREATED` | Chave de API criada | `AccessHandler::tokenCreated()` |
| `ACCESS_TOKEN_ENABLED` | Chave de API reativada | `AccessHandler::tokenEnabled()` |
| `ACCESS_TOKEN_DISABLED` | Chave de API desabilitada | `AccessHandler::tokenDisabled()` |
| `ACCESS_TOKEN_DELETED` | Chave de API removida | `AccessHandler::tokenDeleted()` |
| `ACCESS_TOKEN_EXPIRING_SOON` | Chave de API expirando em breve | `AccessHandler::tokenExpiringSoon()` |
| `ACCESS_TOKEN_EXPIRED` | Chave de API expirada | `AccessHandler::tokenExpired()` |

## 🎧 Criando Listeners

### 1. Criar o Listener

```bash
php artisan make:listener AsaasPaymentConfirmedListener
```

### 2. Registrar no EventServiceProvider

```php
// app/Providers/EventServiceProvider.php

use SistemAtc\Asaas\Events\AsaasPaymentEvent;
use App\Listeners\AsaasPaymentConfirmedListener;

protected $listen = [
    AsaasPaymentEvent::class => [
        AsaasPaymentConfirmedListener::class,
    ],
];
```

### 3. Implementar a Lógica

```php
// app/Listeners/AsaasPaymentConfirmedListener.php

namespace App\Listeners;

use SistemAtc\Asaas\Events\AsaasPaymentEvent;

class AsaasPaymentConfirmedListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        // Verificar o tipo de evento
        if ($event->eventType === 'PAYMENT_CONFIRMED') {
            $payment = $event->payload->payment;
            
            // Processar pagamento confirmado
            $this->processPayment($payment);
        }
    }
    
    private function processPayment($payment)
    {
        // Sua lógica aqui
        // Exemplo: atualizar status do pedido
        // Exemplo: enviar email de confirmação
        // Exemplo: liberar acesso ao produto
    }
}
```

### 4. Acessar Dados do Webhook

O evento `AsaasPaymentEvent` contém:

- `$event->eventType`: Tipo do evento (ex: `PAYMENT_CONFIRMED`)
- `$event->payload`: Objeto DTO com todos os dados do webhook

**Exemplo para Payment:**
```php
$payment = $event->payload->payment;
$paymentId = $payment->id;
$value = $payment->value;
$status = $payment->status;
$customer = $payment->customer;
```

## 🔄 Sistema de Idempotência

O sistema implementa idempotência automática para prevenir processamento duplicado de eventos.

### Como Funciona

1. Cada evento possui um `id` único
2. Ao receber um evento, o sistema verifica se já foi processado
3. Se já foi processado, o evento é ignorado
4. O registro é mantido no cache por um período configurável (padrão: 24 horas)

### Configuração

```env
# TTL em segundos (padrão: 86400 = 24 horas)
ASAAS_IDEMPOTENCY_TTL=86400
```

### Desabilitar Idempotência

Não é recomendado, mas se necessário, você pode modificar o `ProcessAsaasWebhook` job.

## 🔒 Segurança

### Validação de Token

O middleware `AsaasTokenValid` valida automaticamente o token enviado pelo Asaas no header `asaas-access-token`.

**Como funciona:**
- Compara o token recebido com o configurado em `ASAAS_WEBHOOK_TOKEN`
- Usa `hash_equals()` para prevenir timing attacks
- Retorna 401 se o token for inválido

### Validação de Payload

- **Tamanho máximo**: 1MB
- **Validação de conteúdo**: Payload não pode estar vazio
- **Logging**: Tentativas inválidas são registradas

### Boas Práticas

1. ✅ Sempre use HTTPS em produção
2. ✅ Configure um token forte e único
3. ✅ Mantenha o token seguro (não commite no repositório)
4. ✅ Monitore os logs para detectar tentativas de acesso não autorizadas
5. ✅ Use rate limiting se necessário

## 💡 Exemplos Práticos

### Exemplo 1: Processar Pagamento Confirmado

```php
// app/Listeners/ProcessPaymentListener.php

use SistemAtc\Asaas\Events\AsaasPaymentEvent;
use App\Models\Order;

class ProcessPaymentListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        if ($event->eventType !== 'PAYMENT_CONFIRMED') {
            return;
        }
        
        $payment = $event->payload->payment;
        $externalReference = $payment->externalReference; // ID do seu pedido
        
        $order = Order::find($externalReference);
        
        if ($order) {
            $order->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);
            
            // Enviar email de confirmação
            // Liberar acesso ao produto
            // etc.
        }
    }
}
```

### Exemplo 2: Processar Assinatura Criada

```php
// app/Listeners/ProcessSubscriptionListener.php

use SistemAtc\Asaas\Events\AsaasSubscriptionEvent;

class ProcessSubscriptionListener
{
    public function handle(AsaasSubscriptionEvent $event)
    {
        if ($event->eventType === 'SUBSCRIPTION_CREATED') {
            $subscription = $event->payload->subscription;
            
            // Criar registro da assinatura no seu sistema
            // Ativar acesso do usuário
            // etc.
        }
    }
}
```

### Exemplo 3: Processar Múltiplos Eventos

```php
// app/Listeners/AsaasWebhookListener.php

use SistemAtc\Asaas\Events\AsaasPaymentEvent;

class AsaasWebhookListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        match ($event->eventType) {
            'PAYMENT_CONFIRMED' => $this->handlePaymentConfirmed($event),
            'PAYMENT_OVERDUE' => $this->handlePaymentOverdue($event),
            'PAYMENT_REFUNDED' => $this->handlePaymentRefunded($event),
            default => null,
        };
    }
    
    private function handlePaymentConfirmed($event)
    {
        // Lógica para pagamento confirmado
    }
    
    private function handlePaymentOverdue($event)
    {
        // Lógica para pagamento vencido
    }
    
    private function handlePaymentRefunded($event)
    {
        // Lógica para estorno
    }
}
```

## 🐛 Troubleshooting

### Webhook não está sendo recebido

1. Verifique se a URL está configurada corretamente no painel Asaas
2. Verifique se a URL é acessível publicamente
3. Verifique os logs do Laravel
4. Teste a URL manualmente

### Evento não está sendo processado

1. Verifique se o listener está registrado no `EventServiceProvider`
2. Verifique se o handler existe para o tipo de evento
3. Verifique os logs para erros
4. Verifique se o evento não foi ignorado por idempotência

### Token inválido

1. Verifique se `ASAAS_WEBHOOK_TOKEN` está configurado
2. Verifique se o token no painel Asaas corresponde ao configurado
3. Verifique se não há espaços em branco no token

## 📚 Referências

- [Documentação Oficial do Asaas - Webhooks](https://docs.asaas.com/docs/webhooks)
- [Laravel Events & Listeners](https://laravel.com/docs/events)
