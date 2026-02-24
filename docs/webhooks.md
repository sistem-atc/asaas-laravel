# 🪝 Sistema de Webhooks

O sistema de webhooks deste pacote é completo e robusto, suportando **112 eventos** diferentes do Asaas com processamento assíncrono, idempotência e validação de segurança.

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
4. **Dispatch de Job**: O payload é enviado para processamento assíncrono pela fila via `ProcessAsaasWebhook`
5. **Idempotência**: Verifica se o evento já foi processado
6. **Mapeamento**: Mapeamento de evento interno
7. **Dispatch de Event**: Dispara o evento Laravel correspondente
8. **Seus Listeners são executados**: Caso tenha configurado um listener ele é executado

### Arquitetura

```
Asaas → Webhook Endpoint → Middleware (Validação) → Controller → Job (Assíncrono)
                                                                    ↓
                                                                Idempotência Check
                                                                    ↓
                                                                Mapeamento de Evento
                                                                    ↓
                                                                Evento Laravel
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

O sistema suporta **112 eventos** diferentes, organizados por categoria:

### 💰 Eventos de Pagamento (Payment)

| Evento                                    | Descrição                             | Evento Laravel      |
| ----------------------------------------- | ------------------------------------- | ------------------- |
| `PAYMENT_CREATED`                         | Cobrança criada                       | `AsaasPaymentEvent` |
| `PAYMENT_AWAITING_RISK_ANALYSIS`          | Aguardando análise de risco           | `AsaasPaymentEvent` |
| `PAYMENT_APPROVED_BY_RISK_ANALYSIS`       | Aprovado por análise de risco         | `AsaasPaymentEvent` |
| `PAYMENT_REPROVED_BY_RISK_ANALYSIS`       | Reprovado por análise de risco        | `AsaasPaymentEvent` |
| `PAYMENT_AUTHORIZED`                      | Pagamento autorizado                  | `AsaasPaymentEvent` |
| `PAYMENT_UPDATED`                         | Cobrança atualizada                   | `AsaasPaymentEvent` |
| `PAYMENT_CONFIRMED`                       | Pagamento confirmado (saldo pendente) | `AsaasPaymentEvent` |
| `PAYMENT_RECEIVED`                        | Cobrança recebida                     | `AsaasPaymentEvent` |
| `PAYMENT_CREDIT_CARD_CAPTURE_REFUSED`     | Falha na captura do cartão            | `AsaasPaymentEvent` |
| `PAYMENT_ANTICIPATED`                     | Cobrança antecipada                   | `AsaasPaymentEvent` |
| `PAYMENT_OVERDUE`                         | Cobrança vencida                      | `AsaasPaymentEvent` |
| `PAYMENT_DELETED`                         | Cobrança removida                     | `AsaasPaymentEvent` |
| `PAYMENT_RESTORED`                        | Cobrança restaurada                   | `AsaasPaymentEvent` |
| `PAYMENT_REFUNDED`                        | Cobrança estornada                    | `AsaasPaymentEvent` |
| `PAYMENT_PARTIALLY_REFUNDED`              | Cobrança estornada parcialmente       | `AsaasPaymentEvent` |
| `PAYMENT_REFUND_IN_PROGRESS`              | Estorno em processamento              | `AsaasPaymentEvent` |
| `PAYMENT_RECEIVED_IN_CASH_UNDONE`         | Recebimento em dinheiro desfeito      | `AsaasPaymentEvent` |
| `PAYMENT_CHARGEBACK_REQUESTED`            | Chargeback recebido                   | `AsaasPaymentEvent` |
| `PAYMENT_CHARGEBACK_DISPUTE`              | Em disputa de chargeback              | `AsaasPaymentEvent` |
| `PAYMENT_AWAITING_CHARGEBACK_REVERSAL`    | Aguardando repasse de chargeback      | `AsaasPaymentEvent` |
| `PAYMENT_DUNNING_RECEIVED`                | Recebimento de negativação            | `AsaasPaymentEvent` |
| `PAYMENT_DUNNING_REQUESTED`               | Requisição de negativação             | `AsaasPaymentEvent` |
| `PAYMENT_BANK_SLIP_VIEWED`                | Boleto visualizado                    | `AsaasPaymentEvent` |
| `PAYMENT_CHECKOUT_VIEWED`                 | Fatura visualizada                    | `AsaasPaymentEvent` |
| `PAYMENT_SPLIT_CANCELLED`                 | Split de pagamento cancelado          | `AsaasPaymentEvent` |
| `PAYMENT_SPLIT_DIVERGENCE_BLOCK`          | Bloqueio por divergência de split     | `AsaasPaymentEvent` |
| `PAYMENT_SPLIT_DIVERGENCE_BLOCK_FINISHED` | Bloqueio de split finalizado          | `AsaasPaymentEvent` |

### 🔄 Eventos de Assinatura (Subscription)

| Evento                                         | Descrição                      | Evento Laravel           |
| ---------------------------------------------- | ------------------------------ | ------------------------ |
| `SUBSCRIPTION_CREATED`                         | Assinatura criada              | `AsaasSubscriptionEvent` |
| `SUBSCRIPTION_UPDATED`                         | Assinatura atualizada          | `AsaasSubscriptionEvent` |
| `SUBSCRIPTION_INACTIVATED`                     | Assinatura inativada           | `AsaasSubscriptionEvent` |
| `SUBSCRIPTION_DELETED`                         | Assinatura removida            | `AsaasSubscriptionEvent` |
| `SUBSCRIPTION_SPLIT_DIVERGENCE_BLOCK`          | Assinatura bloqueada por split | `AsaasSubscriptionEvent` |
| `SUBSCRIPTION_SPLIT_DIVERGENCE_BLOCK_FINISHED` | Bloqueio de split finalizado   | `AsaasSubscriptionEvent` |

### 📄 Eventos de Nota Fiscal (Invoice)

| Evento                            | Descrição                           | Evento Laravel      |
| --------------------------------- | ----------------------------------- | ------------------- |
| `INVOICE_CREATED`                 | Nota fiscal criada                  | `AsaasInvoiceEvent` |
| `INVOICE_UPDATED`                 | Nota fiscal atualizada              | `AsaasInvoiceEvent` |
| `INVOICE_SYNCHRONIZED`            | Nota fiscal enviada                 | `AsaasInvoiceEvent` |
| `INVOICE_AUTHORIZED`              | Nota fiscal emitida                 | `AsaasInvoiceEvent` |
| `INVOICE_PROCESSING_CANCELLATION` | Cancelamento de NF em processamento | `AsaasInvoiceEvent` |
| `INVOICE_CANCELED`                | Nota fiscal cancelada               | `AsaasInvoiceEvent` |
| `INVOICE_CANCELLATION_DENIED`     | Cancelamento de NF recusado         | `AsaasInvoiceEvent` |
| `INVOICE_ERROR`                   | Nota fiscal com erro                | `AsaasInvoiceEvent` |

### 💸 Eventos de Transferência (Transfer)

| Evento                        | Descrição                               | Evento Laravel       |
| ----------------------------- | --------------------------------------- | -------------------- |
| `TRANSFER_CREATED`            | Transferência criada                    | `AsaasTransferEvent` |
| `TRANSFER_PENDING`            | Transferência pendente                  | `AsaasTransferEvent` |
| `TRANSFER_IN_BANK_PROCESSING` | Transferência em processamento bancário | `AsaasTransferEvent` |
| `TRANSFER_BLOCKED`            | Transferência bloqueada                 | `AsaasTransferEvent` |
| `TRANSFER_DONE`               | Transferência realizada                 | `AsaasTransferEvent` |
| `TRANSFER_FAILED`             | Transferência falhou                    | `AsaasTransferEvent` |
| `TRANSFER_CANCELLED`          | Transferência cancelada                 | `AsaasTransferEvent` |

### 🧾 Eventos de Conta (Bill)

| Evento                 | Descrição                              | Evento Laravel   |
| ---------------------- | -------------------------------------- | ---------------- |
| `BILL_CREATED`         | Pague Contas criado                    | `AsaasBillEvent` |
| `BILL_PENDING`         | Pague Contas pendente                  | `AsaasBillEvent` |
| `BILL_BANK_PROCESSING` | Pague Contas em processamento bancário | `AsaasBillEvent` |
| `BILL_PAID`            | Pague Contas pago                      | `AsaasBillEvent` |
| `BILL_CANCELLED`       | Pague Contas cancelado                 | `AsaasBillEvent` |
| `BILL_FAILED`          | Pague Contas falhou                    | `AsaasBillEvent` |
| `BILL_REFUNDED`        | Pague Contas estornado                 | `AsaasBillEvent` |

### 📈 Eventos de Antecipação (Receivable)

| Evento                              | Descrição                         | Evento Laravel         |
| ----------------------------------- | --------------------------------- | ---------------------- |
| `RECEIVABLE_ANTICIPATION_CANCELLED` | Antecipação cancelada             | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_SCHEDULED` | Antecipação agendada              | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_PENDING`   | Antecipação em análise            | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_CREDITED`  | Antecipação creditada             | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_DEBITED`   | Antecipação debitada              | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_DENIED`    | Solicitação de antecipação negada | `AsaasReceivableEvent` |
| `RECEIVABLE_ANTICIPATION_OVERDUE`   | Antecipação vencida               | `AsaasReceivableEvent` |

### 📱 Eventos de Recarga (Mobile)

| Evento                            | Descrição                     | Evento Laravel     |
| --------------------------------- | ----------------------------- | ------------------ |
| `MOBILE_PHONE_RECHARGE_PENDING`   | Recarga de celular pendente   | `AsaasMobileEvent` |
| `MOBILE_PHONE_RECHARGE_CANCELLED` | Recarga de celular cancelada  | `AsaasMobileEvent` |
| `MOBILE_PHONE_RECHARGE_CONFIRMED` | Recarga de celular confirmada | `AsaasMobileEvent` |
| `MOBILE_PHONE_RECHARGE_REFUNDED`  | Recarga de celular estornada  | `AsaasMobileEvent` |

### 🏦 Eventos de Conta (Account)

| Evento                                               | Descrição                   | Evento Laravel      |
| ---------------------------------------------------- | --------------------------- | ------------------- |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_APPROVED`          | Conta bancária aprovada     | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_AWAITING_APPROVAL` | Conta bancária em análise   | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_PENDING`           | Conta bancária pendente     | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_BANK_ACCOUNT_INFO_REJECTED`          | Conta bancária reprovada    | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_APPROVED`            | Info. comerciais aprovadas  | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_AWAITING_APPROVAL`   | Info. comerciais em análise | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_PENDING`             | Info. comerciais pendentes  | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_COMMERCIAL_INFO_REJECTED`            | Info. comerciais reprovadas | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_DOCUMENT_APPROVED`                   | Documentos aprovados        | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_DOCUMENT_AWAITING_APPROVAL`          | Documentos em análise       | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_DOCUMENT_PENDING`                    | Documentos pendentes        | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_DOCUMENT_REJECTED`                   | Documentos reprovados       | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_APPROVED`           | Conta aprovada              | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_AWAITING_APPROVAL`  | Conta em análise geral      | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_PENDING`            | Conta pendente geral        | `AsaasAccountEvent` |
| `ACCOUNT_STATUS_GENERAL_APPROVAL_REJECTED`           | Conta reprovada geral       | `AsaasAccountEvent` |

### 🛒 Eventos de Checkout

| Evento              | Descrição          | Evento Laravel       |
| ------------------- | ------------------ | -------------------- |
| `CHECKOUT_CREATED`  | Checkout criado    | `AsaasCheckoutEvent` |
| `CHECKOUT_CANCELED` | Checkout cancelado | `AsaasCheckoutEvent` |
| `CHECKOUT_EXPIRED`  | Checkout expirado  | `AsaasCheckoutEvent` |
| `CHECKOUT_PAID`     | Checkout pago      | `AsaasCheckoutEvent` |

### 💰 Eventos de Saldo (Balance)

| Evento                    | Descrição                   | Evento Laravel      |
| ------------------------- | --------------------------- | ------------------- |
| `BALANCE_VALUE_BLOCKED`   | Valor bloqueado no saldo    | `AsaasBalanceEvent` |
| `BALANCE_VALUE_UNBLOCKED` | Valor desbloqueado no saldo | `AsaasBalanceEvent` |

### 🔄 Eventos de Transferência Interna (Internal)

| Evento                     | Descrição                        | Evento Laravel       |
| -------------------------- | -------------------------------- | -------------------- |
| `INTERNAL_TRANSFER_CREDIT` | Crédito de transferência interna | `AsaasInternalEvent` |
| `INTERNAL_TRANSFER_DEBIT`  | Débito de transferência interna  | `AsaasInternalEvent` |

### 🔑 Eventos de Token de Acesso (Access)

| Evento                       | Descrição                       | Evento Laravel     |
| ---------------------------- | ------------------------------- | ------------------ |
| `ACCESS_TOKEN_CREATED`       | Chave de API criada             | `AsaasAccessEvent` |
| `ACCESS_TOKEN_ENABLED`       | Chave de API reativada          | `AsaasAccessEvent` |
| `ACCESS_TOKEN_DISABLED`      | Chave de API desabilitada       | `AsaasAccessEvent` |
| `ACCESS_TOKEN_DELETED`       | Chave de API removida           | `AsaasAccessEvent` |
| `ACCESS_TOKEN_EXPIRING_SOON` | Chave de API expirando em breve | `AsaasAccessEvent` |
| `ACCESS_TOKEN_EXPIRED`       | Chave de API expirada           | `AsaasAccessEvent` |

### 🔑 Eventos de Pix Automatico (Pix)

| Evento                                                  | Descrição                                          | Evento Laravel  |
| ------------------------------------------------------- | -------------------------------------------------- | --------------- |
| `PIX_AUTOMATIC_RECURRING_ELIGIBILITY_UPDATED`           | Elegibilidade para Pix Automático atualizada       | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_AUTHORIZATION_CREATED`         | Autorização de Pix Automático criada               | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_AUTHORIZATION_ACTIVATED`       | Autorização de Pix Automático ativada              | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_AUTHORIZATION_CANCELLED`       | Autorização de Pix Automático cancelada            | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_AUTHORIZATION_EXPIRED`         | Autorização de Pix Automático expirada             | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_AUTHORIZATION_REFUSED`         | Autorização de Pix Automático recusada             | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_PAYMENT_INSTRUCTION_CREATED`   | Instrução de pagamento do Pix Automático criada    | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_PAYMENT_INSTRUCTION_SCHEDULED` | Instrução de pagamento do Pix Automático agendada  | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_PAYMENT_INSTRUCTION_REFUSED`   | Instrução de pagamento do Pix Automático recusada  | `AsaasPixEvent` |
| `PIX_AUTOMATIC_RECURRING_PAYMENT_INSTRUCTION_CANCELLED` | Instrução de pagamento do Pix Automático cancelada | `AsaasPixEvent` |

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
use SistemAtc\Asaas\Enum\WebhookEventAsaas;

class AsaasPaymentConfirmedListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        // Verificar o tipo de evento
        if ($event->eventType === WebhookEventAsaas::PAYMENT_CONFIRMED->value) {
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

Os eventos contém:

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
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use App\Models\Order;

class ProcessPaymentListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        if ($event->eventType !== WebhookEventAsaas::PAYMENT_CONFIRMED->value) {
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
use SistemAtc\Asaas\Enum\WebhookEventAsaas;

class ProcessSubscriptionListener
{
    public function handle(AsaasSubscriptionEvent $event)
    {
        if ($event->eventType === WebhookEventAsaas::SUBSCRIPTION_CREATED->value) {
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
use SistemAtc\Asaas\Enum\WebhookEventAsaas;

class AsaasWebhookListener
{
    public function handle(AsaasPaymentEvent $event)
    {
        match ($event->eventType) {
            WebhookEventAsaas::PAYMENT_CONFIRMED->value => $this->handlePaymentConfirmed($event),
            WebhookEventAsaas::PAYMENT_OVERDUE->value => $this->handlePaymentOverdue($event),
            WebhookEventAsaas::PAYMENT_REFUNDED->value => $this->handlePaymentRefunded($event),
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
2. Verifique se existe suporte para o evento (está listado na seção Eventos Disponíveis)
3. Verifique os logs do job ProcessAsaasWebhook
4. Verifique se o evento não foi ignorado por idempotência

### Token inválido

1. Verifique se `ASAAS_WEBHOOK_TOKEN` está configurado
2. Verifique se o token no painel Asaas corresponde ao configurado
3. Verifique se não há espaços em branco no token

## 📚 Referências

- [Documentação Oficial do Asaas - Webhooks](https://docs.asaas.com/docs/webhooks)
- [Laravel Events & Listeners](https://laravel.com/docs/events)
