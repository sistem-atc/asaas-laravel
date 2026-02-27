# Pacote em fase de testes.

# Asaas Laravel

[![Latest Version](https://img.shields.io/github/v/tag/sistem-atc/asaas-laravel?label=version)](https://github.com/sistem-atc/asaas-laravel/tags)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.2-blue)](https://www.php.net/)
[![Laravel Version](https://img.shields.io/badge/laravel-%3E%3D10.0-red)](https://laravel.com/)
[![License](https://img.shields.io/github/license/sistem-atc/asaas-laravel)](LICENSE)

Pacote Laravel completo para integração com a API do Asaas, incluindo suporte completo a Webhooks.

## 📋 Sobre

Este pacote fornece uma interface simples e intuitiva para integração com a plataforma de pagamentos Asaas, permitindo gerenciar clientes, cobranças, assinaturas, antecipações e receber notificações via webhooks de forma nativa no Laravel.

## ✨ Funcionalidades

- 🔐 Autenticação automática com API Key
- 👥 Gerenciamento completo de clientes
- 💰 Criação e gerenciamento de cobranças
- 🔄 Suporte a assinaturas (recorrência)
- 📊 Antecipação de recebíveis
- 🪝 **Sistema completo de Webhooks com 100+ eventos**
- 🧪 Suporte a ambiente de testes (sandbox)
- 📝 Validação de dados integrada
- 🎯 Facade para acesso simplificado
- 🔒 Segurança robusta com validação de tokens

## 📦 Instalação

Instale o pacote via Composer:

```bash
composer require sistem-atc/asaas-laravel
```

### Publicar arquivos de configuração

Publique o arquivo de configuração:

```bash
php artisan vendor:publish --provider="SistemAtc\Asaas\AsaasServiceProvider" --tag=asaas-config
```

Isso irá criar o arquivo `config/asaas.php` no seu projeto.

### Configuração

Adicione as seguintes variáveis ao seu arquivo `.env`:

```env
# Ambiente (sandbox ou production)
ASAAS_ENVIRONMENT=sandbox

# Configurações de Produção
ASAAS_BASE_URL=https://api.asaas.com
ASAAS_API_VERSION=v3
ASAAS_ACCESS_TOKEN=seu-token-de-producao
ASAAS_PIX_KEY=sua-chave-pix-producao

# Configurações de Sandbox
ASAAS_SANDBOX_BASE_URL=https://sandbox.asaas.com
ASAAS_SANDBOX_API_VERSION=v3
ASAAS_SANDBOX_ACCESS_TOKEN=seu-token-de-sandbox
ASAAS_SANDBOX_PIX_KEY=sua-chave-pix-sandbox

# Segurança de Webhooks
ASAAS_WEBHOOK_TOKEN=seu-token-secreto-webhook
ASAAS_IDEMPOTENCY_TTL=86400
ASAAS_ROUTE_EVENTS=/asaas-events
```

## 🚀 Uso Básico

### Usando a Facade

```php
use SistemAtc\Asaas\Facades\Asaas;

// Criar um cliente
$cliente = Asaas::customer()->create(
    AsaasCustomer::fromArray([
        'name' => 'João da Silva',
        'email' => 'joao@example.com',
        'cpfCnpj' => '12345678900',
        'mobilePhone' => '11999999999',
    ])
);
```

### Usando o Service Container

```php
use SistemAtc\Asaas\Asaas;

$asaas = app(Asaas::class);
$cliente = $asaas->customer()->create(...);
```

## 📚 Documentação Completa

### Métodos Disponíveis

Este pacote implementa os seguintes métodos da API Asaas:

#### ✅ Clientes

- [Criar Cliente](docs/methods/customer.md#criar-cliente)
- [Listar Clientes](docs/methods/customer.md#listar-clientes)
- [Buscar Cliente](docs/methods/customer.md#buscar-cliente)
- [Atualizar Cliente](docs/methods/customer.md#atualizar-cliente)
- [Remover Cliente](docs/methods/customer.md#remover-cliente)
- [Restaurar Cliente](docs/methods/customer.md#restaurar-cliente)
- [Notificações do Cliente](docs/methods/customer.md#notificações-do-cliente)

#### ✅ Cobranças (Payments)

- [Criar Cobrança](docs/methods/payment.md#criar-cobrança)
- [Listar Cobranças](docs/methods/payment.md#listar-cobranças)
- [Capturar Pré-autorização](docs/methods/payment.md#capturar-pré-autorização)
- [Gerar QR Code PIX](docs/methods/payment.md#gerar-qr-code-pix)

#### ✅ Assinaturas (Subscriptions)

- [Criar Assinatura](docs/methods/subscription.md#criar-assinatura)

#### ✅ Contas (Bills)

- [Criar Conta](docs/methods/bill.md#criar-conta)
- [Listar Contas](docs/methods/bill.md#listar-contas)
- [Buscar Conta](docs/methods/bill.md#buscar-conta)
- [Simular Pagamento](docs/methods/bill.md#simular-pagamento)
- [Cancelar Conta](docs/methods/bill.md#cancelar-conta)

#### ✅ Antecipações

- [Solicitar Antecipação](docs/methods/anticipation.md#solicitar-antecipação)
- [Listar Antecipações](docs/methods/anticipation.md#listar-antecipações)
- [Buscar Antecipação](docs/methods/anticipation.md#buscar-antecipação)
- [Simular Antecipação](docs/methods/anticipation.md#simular-antecipação)
- [Configurar Antecipação Automática](docs/methods/anticipation.md#configurar-antecipação-automática)
- [Limites de Antecipação](docs/methods/anticipation.md#limites-de-antecipação)
- [Cancelar Antecipação](docs/methods/anticipation.md#cancelar-antecipação)

#### ✅ Informações da Conta

- [Buscar Dados Comerciais](docs/methods/accountinfo.md#buscar-dados-comerciais)
- [Atualizar Dados Comerciais](docs/methods/accountinfo.md#atualizar-dados-comerciais)
- [Personalizar Checkout](docs/methods/accountinfo.md#personalizar-checkout)
- [Status da Conta](docs/methods/accountinfo.md#status-da-conta)
- [Taxas da Conta](docs/methods/accountinfo.md#taxas-da-conta)
- [Número da Conta Asaas](docs/methods/accountinfo.md#número-da-conta-asaas)
- [Wallet ID](docs/methods/accountinfo.md#wallet-id)
- [Remover Subconta White Label](docs/methods/accountinfo.md#remover-subconta-white-label)

#### ✅ PIX

- [Criar QR Code Estático](docs/methods/pix.md#criar-qr-code-estático)

## 🪝 Webhooks

O sistema de webhooks deste pacote é completo e robusto, suportando **mais de 100 eventos** diferentes do Asaas.

### 📖 Documentação Completa de Webhooks

Consulte a [documentação completa de webhooks](docs/webhooks.md) para:

- Como configurar webhooks
- Todos os eventos disponíveis
- Como criar listeners personalizados
- Sistema de idempotência
- Validação de segurança
- Exemplos práticos

### 🚀 Início Rápido de Webhooks

1. **Configure a URL do webhook no painel do Asaas:**

   ```
   https://seudominio.com.br/api/asaas-events
   ```

2. **Defina um token no painel Asaas conforme imagem:**

   ```bash
   https://files.readme.io/1151556f343ba745635c3bb784c6623b8aeff4cd640a5c15abed19054445672f-image_1.png
   ```

3. **Crie um listener:**

   ```bash
   php artisan make:listener AsaasPaymentConfirmedListener
   ```

4. **Registre o listener no `EventServiceProvider (Laravel 10) ou AppServiceProvider (Laravel 11+)`:**

   ```php
   use SistemAtc\Asaas\Events\AsaasPaymentEvent;

   'Laravel 10'
   protected $listen = [
       AsaasPaymentEvent::class => [
           AsaasPaymentConfirmedListener::class,
       ],
   ];

   'Laravel 11 +'
   public function boot(): void
   {
      Event::listen(
        AsaasPaymentEvent::class,
        AsaasPaymentConfirmedListener::class,
      );
   }
   ```

5. **Implemente a lógica:**
   ```php
   public function handle(AsaasPaymentEvent $payload)
   {
       if ($payload->event === WebhookEventAsaas::PAYMENT_CONFIRMED) {
           $payment = $payload->data->payment;
           // Processar pagamento confirmado
       }
   }
   ```

## 🧪 Testes

Execute os testes com:

```bash
composer test
```

ou

```bash
./vendor/bin/pest
```

## 🔒 Segurança

### Medidas de Segurança Implementadas

- ✅ Validação de token de webhook com `hash_equals()` (prevenção de timing attacks)
- ✅ Sistema de idempotência para prevenir processamento duplicado
- ✅ Validação de tamanho de payload (máximo 1MB)
- ✅ Proteção contra path traversal
- ✅ Validação de configuração de ambiente
- ✅ Logging seguro sem expor informações sensíveis

### Boas Práticas

- ⚠️ **Nunca** exponha suas chaves de API em repositórios públicos
- ⚠️ Utilize o ambiente sandbox para testes
- ⚠️ Valide sempre os webhooks recebidos
- ⚠️ Mantenha suas dependências atualizadas
- ⚠️ Configure o `ASAAS_WEBHOOK_TOKEN` em produção

## 📚 Documentação da API Asaas

Para mais detalhes sobre os parâmetros e respostas da API, consulte a [documentação oficial do Asaas](https://docs.asaas.com/).

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
