# Asaas Laravel

[![Latest Version](https://img.shields.io/github/v/tag/sistem-atc/asaas-laravel?label=version)](https://github.com/sistem-atc/asaas-laravel/tags)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.2-blue)](https://www.php.net/)
[![Laravel Version](https://img.shields.io/badge/laravel-%3E%3D10.0-red)](https://laravel.com/)
[![License](https://img.shields.io/github/license/sistem-atc/asaas-laravel)](LICENSE)

Pacote Laravel para integracao com a API do Asaas, incluindo suporte a webhooks.

## Instalacao

```bash
composer require sistem-atc/asaas-laravel
```

Publique o arquivo de configuracao:

```bash
php artisan vendor:publish --provider="SistemAtc\Asaas\AsaasServiceProvider" --tag=asaas-config
```

## Configuracao

No arquivo `.env`:

```env
ASAAS_ENVIRONMENT=sandbox

ASAAS_BASE_URL=https://api.asaas.com
ASAAS_API_VERSION=v3
ASAAS_ACCESS_TOKEN=seu-token-de-producao
ASAAS_PIX_KEY=sua-chave-pix-producao

ASAAS_SANDBOX_BASE_URL=https://sandbox.asaas.com
ASAAS_SANDBOX_API_VERSION=v3
ASAAS_SANDBOX_ACCESS_TOKEN=seu-token-de-sandbox
ASAAS_SANDBOX_PIX_KEY=sua-chave-pix-sandbox

ASAAS_WEBHOOK_TOKEN=seu-token-secreto-webhook
ASAAS_IDEMPOTENCY_TTL=86400
ASAAS_ROUTE_EVENTS=/asaas-events
```

## Uso Basico

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Customer\CustomerRequestDTO;

$customer = Asaas::customer()->createNewCustomer(
    CustomerRequestDTO::fromArray([
        'name' => 'Joao da Silva',
        'email' => 'joao@example.com',
        'cpfCnpj' => '12345678900',
        'mobilePhone' => '11999999999',
    ])
);
```

## Documentacao de Metodos

Todos os metodos implementados possuem documentacao em `docs/methods`:

- [AccountDocument](docs/methods/accountdocument.md)
- [AccountInfo](docs/methods/accountinfo.md)
- [Anticipation](docs/methods/anticipation.md)
- [AutomaticPix](docs/methods/automaticpix.md)
- [Bill](docs/methods/bill.md)
- [Chargeback](docs/methods/chargeback.md)
- [Checkout](docs/methods/checkout.md)
- [CreditBureauReport](docs/methods/creditbureaureport.md)
- [CreditCard](docs/methods/creditcard.md)
- [Customer](docs/methods/customer.md)
- [EscrowAccount](docs/methods/escrowaccount.md)
- [Finance](docs/methods/finance.md)
- [FinancialTransaction](docs/methods/financialtransaction.md)
- [FiscalInfo](docs/methods/fiscalinfo.md)
- [Installment](docs/methods/installment.md)
- [Invoice](docs/methods/invoice.md)
- [MobilePhoneRecharge](docs/methods/mobilephonerecharge.md)
- [Notification](docs/methods/notification.md)
- [Payment](docs/methods/payment.md)
- [PaymentDocument](docs/methods/paymentdocument.md)
- [PaymentDunning](docs/methods/paymentdunning.md)
- [PaymentLink](docs/methods/paymentlink.md)
- [PaymentRefund](docs/methods/paymentrefund.md)
- [PaymentSplit](docs/methods/paymentsplit.md)
- [PaymentWithSummaryData](docs/methods/paymentwithsummarydata.md)
- [Pix](docs/methods/pix.md)
- [PixTransaction](docs/methods/pixtransaction.md)
- [RecurringPix](docs/methods/recurringpix.md)
- [Subaccount](docs/methods/subaccount.md)
- [Subscription](docs/methods/subscription.md)
- [Transfer](docs/methods/transfer.md)
- [Webhook](docs/methods/webhook.md)

## Webhooks

A documentacao completa de webhooks esta em:

- [docs/webhooks.md](docs/webhooks.md)

Para configurar o token e o endpoint no painel do Asaas, use a referencia visual abaixo:

![Token de webhook no painel Asaas](https://ibb.co/99G0y218)

## Testes

Executar todos os testes:

```bash
composer test
```

ou

```bash
./vendor/bin/pest
```

## Licenca

Este pacote esta licenciado sob [MIT License](LICENSE).
