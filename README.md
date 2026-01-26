# Asaas Laravel

[![Latest Version](https://img.shields.io/github/v/tag/sistem-atc/asaas-laravel?label=version)](https://github.com/sistem-atc/asaas-laravel/tags)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.0-blue)](https://www.php.net/)
[![Laravel Version](https://img.shields.io/badge/laravel-%3E%3D9.0-red)](https://laravel.com/)
[![License](https://img.shields.io/github/license/sistem-atc/asaas-laravel)](LICENSE)

Pacote Laravel completo para integração com a API do Asaas, incluindo suporte a Webhooks.

## 📋 Sobre

Este pacote fornece uma interface simples e intuitiva para integração com a plataforma de pagamentos Asaas, permitindo gerenciar clientes, cobranças, assinaturas e receber notificações via webhooks de forma nativa no Laravel.

## ✨ Funcionalidades

- 🔐 Autenticação automática com API Key
- 👥 Gerenciamento completo de clientes
- 💰 Criação e gerenciamento de cobranças
- 🔄 Suporte a assinaturas (recorrência)
- 📊 Parcelamentos
- 🪝 **Sistema completo de Webhooks**
- 🧪 Suporte a ambiente de testes (sandbox)
- 📝 Validação de dados integrada
- 🎯 Facade para acesso simplificado

## 📦 Instalação

Instale o pacote via Composer:

```bash
composer require sistem-atc/asaas-laravel
```

### Publicar arquivos de configuração

Publique o arquivo de configuração e rotas de webhooks:

```bash
php artisan vendor:publish --provider="SistemAtc\AsaasLaravel\AsaasServiceProvider"
```

Isso irá criar:
- `config/asaas.php` - Arquivo de configuração
- Rotas de webhooks no seu projeto

### Configuração

Adicione as seguintes variáveis ao seu arquivo `.env`:

```env
ASAAS_API_KEY=your-api-key-here
ASAAS_ENVIRONMENT=sandbox # ou production
ASAAS_WEBHOOK_TOKEN=your-webhook-token # opcional, para validação de webhooks
```

Configure sua API Key no arquivo `config/asaas.php`:

```php
return [
    'api_key' => env('ASAAS_API_KEY'),
    'environment' => env('ASAAS_ENVIRONMENT', 'sandbox'),
    'webhook_token' => env('ASAAS_WEBHOOK_TOKEN'),
];
```

## 🚀 Uso

### Clientes

#### Criar um novo cliente

```php
use SistemAtc\AsaasLaravel\Facades\Asaas;

$cliente = Asaas::customer()->create([
    'name' => 'João da Silva',
    'email' => 'joao@example.com',
    'cpfCnpj' => '12345678900',
    'mobilePhone' => '11999999999',
    'address' => 'Rua Exemplo',
    'addressNumber' => '123',
    'province' => 'Centro',
    'postalCode' => '01234567'
]);
```

#### Buscar cliente

```php
// Por ID
$cliente = Asaas::customer()->find('cus_000000000000');

// Por CPF/CNPJ
$cliente = Asaas::customer()->findByCpfCnpj('12345678900');

// Por email
$cliente = Asaas::customer()->findByEmail('joao@example.com');

// Listar todos
$clientes = Asaas::customer()->list();
```

#### Atualizar cliente

```php
$cliente = Asaas::customer()->update('cus_000000000000', [
    'name' => 'João Silva Santos',
    'email' => 'joao.novo@example.com'
]);
```

#### Deletar cliente

```php
Asaas::customer()->delete('cus_000000000000');
```

### Cobranças

#### Criar cobrança única

```php
$cobranca = Asaas::charge()->create([
    'customer' => 'cus_000000000000',
    'billingType' => 'BOLETO', // BOLETO, CREDIT_CARD, PIX, etc.
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de serviço',
]);
```

#### Criar cobrança com cartão de crédito

```php
$cobranca = Asaas::charge()->create([
    'customer' => 'cus_000000000000',
    'billingType' => 'CREDIT_CARD',
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'creditCard' => [
        'holderName' => 'João da Silva',
        'number' => '4111111111111111',
        'expiryMonth' => '12',
        'expiryYear' => '2025',
        'ccv' => '123'
    ],
    'creditCardHolderInfo' => [
        'name' => 'João da Silva',
        'email' => 'joao@example.com',
        'cpfCnpj' => '12345678900',
        'postalCode' => '01234567',
        'addressNumber' => '123',
        'phone' => '11999999999'
    ]
]);
```

#### Criar cobrança PIX

```php
$cobranca = Asaas::charge()->createPix([
    'customer' => 'cus_000000000000',
    'value' => 50.00,
    'dueDate' => '2024-12-31',
]);

// Recuperar QR Code e código copia e cola
$pixQrCode = $cobranca['encodedImage'];
$pixCopyPaste = $cobranca['payload'];
```

#### Buscar cobrança

```php
$cobranca = Asaas::charge()->find('pay_000000000000');
```

#### Listar cobranças

```php
$cobrancas = Asaas::charge()->list([
    'customer' => 'cus_000000000000',
    'status' => 'PENDING' // PENDING, RECEIVED, CONFIRMED, etc.
]);
```

### Assinaturas (Recorrência)

#### Criar assinatura

```php
$assinatura = Asaas::subscription()->create([
    'customer' => 'cus_000000000000',
    'billingType' => 'BOLETO',
    'value' => 99.90,
    'nextDueDate' => '2024-12-01',
    'cycle' => 'MONTHLY', // WEEKLY, MONTHLY, QUARTERLY, YEARLY
    'description' => 'Assinatura mensal'
]);
```

#### Buscar assinatura

```php
$assinatura = Asaas::subscription()->find('sub_000000000000');
```

#### Cancelar assinatura

```php
Asaas::subscription()->delete('sub_000000000000');
```

### Parcelamentos

```php
$parcelamento = Asaas::installment()->create([
    'customer' => 'cus_000000000000',
    'billingType' => 'BOLETO',
    'value' => 300.00,
    'installmentCount' => 3,
    'dueDate' => '2024-12-31'
]);
```

## 🪝 Webhooks

Este pacote inclui suporte completo para webhooks do Asaas.

### Configuração de Webhooks

1. Configure a URL do webhook no painel do Asaas:
```
https://seudominio.com.br/webhooks/asaas
```

2. Crie um listener para os eventos:

```php
php artisan make:listener AsaasPaymentConfirmedListener
```

3. Registre o listener no `EventServiceProvider`:

```php
use SistemAtc\AsaasLaravel\Events\AsaasWebhookReceived;
use App\Listeners\AsaasPaymentConfirmedListener;

protected $listen = [
    AsaasWebhookReceived::class => [
        AsaasPaymentConfirmedListener::class,
    ],
];
```

4. Implemente a lógica no listener:

```php
namespace App\Listeners;

use SistemAtc\AsaasLaravel\Events\AsaasWebhookReceived;

class AsaasPaymentConfirmedListener
{
    public function handle(AsaasWebhookReceived $event)
    {
        $payload = $event->payload;
        
        if ($payload['event'] === 'PAYMENT_CONFIRMED') {
            // Processar pagamento confirmado
            $paymentId = $payload['payment']['id'];
            $value = $payload['payment']['value'];
            
            // Sua lógica aqui
        }
    }
}
```

### Eventos de Webhook disponíveis

O Asaas pode enviar os seguintes eventos:

- `PAYMENT_CREATED` - Cobrança criada
- `PAYMENT_UPDATED` - Cobrança atualizada
- `PAYMENT_CONFIRMED` - Pagamento confirmado
- `PAYMENT_RECEIVED` - Pagamento recebido
- `PAYMENT_OVERDUE` - Pagamento vencido
- `PAYMENT_DELETED` - Cobrança deletada
- `PAYMENT_RESTORED` - Cobrança restaurada
- `PAYMENT_REFUNDED` - Pagamento estornado
- `PAYMENT_RECEIVED_IN_CASH` - Pagamento confirmado em dinheiro
- `PAYMENT_CHARGEBACK_REQUESTED` - Chargeback solicitado
- `PAYMENT_CHARGEBACK_DISPUTE` - Contestação de chargeback
- `PAYMENT_AWAITING_CHARGEBACK_REVERSAL` - Aguardando reversão de chargeback
- `PAYMENT_DUNNING_RECEIVED` - Negativação recebida
- `PAYMENT_DUNNING_REQUESTED` - Negativação solicitada
- `PAYMENT_BANK_SLIP_VIEWED` - Boleto visualizado
- `PAYMENT_CHECKOUT_VIEWED` - Checkout visualizado

### Validação de Webhooks

Para maior segurança, você pode validar os webhooks usando um token:

1. Configure o token no `.env`:
```env
ASAAS_WEBHOOK_TOKEN=seu-token-secreto
```

2. O pacote validará automaticamente o token em cada requisição de webhook.

## 🧪 Testes

Execute os testes com:

```bash
composer test
```

ou

```bash
./vendor/bin/phpunit
```

## 📚 Documentação da API Asaas

Para mais detalhes sobre os parâmetros e respostas da API, consulte a [documentação oficial do Asaas](https://docs.asaas.com/).

## 🔒 Segurança

- Nunca exponha suas chaves de API em repositórios públicos
- Utilize o ambiente sandbox para testes
- Valide sempre os webhooks recebidos
- Mantenha suas dependências atualizadas

Se você descobrir alguma vulnerabilidade de segurança, por favor envie um e-mail para [seu-email@example.com].

## 🤝 Contribuindo

Contribuições são bem-vindas! Por favor:

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abra um Pull Request

## 📝 Changelog

Veja o arquivo [CHANGELOG.md](CHANGELOG.md) para histórico de alterações.

## 📄 Licença

Este pacote é open-source e está licenciado sob a [MIT License](LICENSE).

## 👨‍💻 Autor

Desenvolvido por [Sistem ATC](https://github.com/sistem-atc)

## 🙏 Agradecimentos

- [Asaas](https://www.asaas.com/) pela excelente plataforma de pagamentos
- Comunidade Laravel pelo framework incrível

## 📞 Suporte

- 🐛 [Reportar Bug](https://github.com/sistem-atc/asaas-laravel/issues)
- 💡 [Solicitar Feature](https://github.com/sistem-atc/asaas-laravel/issues)
- 📖 [Documentação](https://github.com/sistem-atc/asaas-laravel/wiki)

---

⭐ Se este pacote foi útil para você, considere dar uma estrela no GitHub!