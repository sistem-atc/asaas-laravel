# 💰 Métodos de Cobrança (Payment)

Documentação completa dos métodos disponíveis para gerenciamento de cobranças.

## 📋 Índice

- [Criar Cobrança](#criar-cobrança)
- [Listar Cobranças](#listar-cobranças)
- [Capturar Pré-autorização](#capturar-pré-autorização)
- [Gerar QR Code PIX](#gerar-qr-code-pix)

## Criar Cobrança

Cria uma nova cobrança no Asaas.

### Método

```php
Asaas::payment()->create(PaymentDTO $data): ?PaymentoDTOResponse
```

### Parâmetros

O método recebe um objeto `PaymentDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\Enum\BillingType;

$payment = PaymentDTO::fromArray([
    'customer' => AsaasCustomer::fromArray([
        'asaas_id' => 'cus_000000000000',
    ]),
    'billing_type' => BillingType::BOLETO,
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de serviço',
]);
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `customer` | AsaasCustomer | Sim | Cliente da cobrança |
| `billingType` | BillingType | Sim | Tipo de cobrança (BOLETO, CREDIT_CARD, PIX, etc.) |
| `value` | float | Sim | Valor da cobrança |
| `dueDate` | string | Sim | Data de vencimento (Y-m-d) |
| `description` | string | Não | Descrição da cobrança |
| `externalReference` | string | Não | Referência externa |
| `installmentCount` | int | Não | Número de parcelas |
| `discount` | Discount | Não | Desconto |
| `interest` | Interest | Não | Juros |
| `fine` | Fine | Não | Multa |
| `creditCard` | CreditCard | Não | Dados do cartão de crédito |
| `creditCardHolderInfo` | CreditCardHolderInfo | Não | Dados do portador do cartão |
| `authorizeOnly` | bool | Não | Apenas autorizar (não capturar) |

### Tipos de Cobrança

- `BOLETO` - Boleto bancário
- `CREDIT_CARD` - Cartão de crédito
- `PIX` - PIX
- `DEBIT_CARD` - Cartão de débito

### Exemplo: Cobrança com Boleto

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\Enum\BillingType;

$payment = PaymentDTO::fromArray([
    'customer' => AsaasCustomer::fromArray([
        'asaas_id' => 'cus_000000000000',
    ]),
    'billing_type' => BillingType::BOLETO,
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de serviço',
    'externalReference' => 'PED-001',
]);

$cobranca = Asaas::payment()->create($payment);

if ($cobranca) {
    echo "Cobrança criada: " . $cobranca->id;
    echo "Link do boleto: " . $cobranca->bankSlipUrl;
}
```

### Exemplo: Cobrança com Cartão de Crédito

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;
use SistemAtc\Asaas\Enum\BillingType;

$payment = PaymentDTO::fromArray([
    'customer' => AsaasCustomer::fromArray([
        'asaas_id' => 'cus_000000000000',
    ]),
    'billing_type' => BillingType::CREDIT_CARD,
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de serviço',
    'creditCard' => CreditCard::fromArray([
        'holderName' => 'João da Silva',
        'number' => '4111111111111111',
        'expiryMonth' => '12',
        'expiryYear' => '2025',
        'ccv' => '123',
    ]),
    'creditCardHolderInfo' => CreditCardHolderInfo::fromArray([
        'name' => 'João da Silva',
        'email' => 'joao@example.com',
        'cpfCnpj' => '12345678900',
        'postalCode' => '01234567',
        'addressNumber' => '123',
        'phone' => '11999999999',
    ]),
]);

$cobranca = Asaas::payment()->create($payment);
```

### Exemplo: Cobrança PIX

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\Enum\BillingType;

$payment = PaymentDTO::fromArray([
    'customer' => AsaasCustomer::fromArray([
        'asaas_id' => 'cus_000000000000',
    ]),
    'billing_type' => BillingType::PIX,
    'value' => 50.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento via PIX',
]);

$cobranca = Asaas::payment()->create($payment);

if ($cobranca) {
    // Para obter o QR Code PIX, use o método getQrCodePix
    $pixQrCode = Asaas::payment()->getQrCodePix($cobranca->id);
    echo "QR Code: " . $pixQrCode->encodedImage;
    echo "Código Copia e Cola: " . $pixQrCode->payload;
}
```

## Listar Cobranças

Lista cobranças com filtros opcionais.

### Método

```php
Asaas::payment()->list(ListPayment $filter): ?array
```

### Parâmetros

O método recebe um objeto `ListPayment` para filtrar os resultados:

```php
use SistemAtc\Asaas\DTO\Shared\Request\ListPayment;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Enum\StatusPayment;

$filter = ListPayment::fromArray([
    'offset' => 0,
    'limit' => 100,
    'customer' => 'cus_000000000000',
    'billingType' => BillingType::BOLETO,
    'status' => StatusPayment::PENDING,
]);
```

### Campos de Filtro

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `offset` | int | Offset para paginação (padrão: 0) |
| `limit` | int | Limite de resultados (padrão: 100) |
| `customer` | string | ID do cliente |
| `billingType` | BillingType | Tipo de cobrança |
| `status` | StatusPayment | Status da cobrança |
| `externalReference` | string | Referência externa |
| `dueDate[ge]` | string | Data de vencimento maior ou igual |
| `dueDate[le]` | string | Data de vencimento menor ou igual |

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\ListPayment;
use SistemAtc\Asaas\Enum\StatusPayment;

// Listar cobranças pendentes
$filter = ListPayment::fromArray([
    'status' => StatusPayment::PENDING,
    'limit' => 50,
]);

$cobrancas = Asaas::payment()->list($filter);

// Filtrar por cliente
$filter = ListPayment::fromArray([
    'customer' => 'cus_000000000000',
]);

$cobrancas = Asaas::payment()->list($filter);
```

## Capturar Pré-autorização

Captura um pagamento que foi apenas autorizado (não capturado).

### Método

```php
Asaas::payment()->capturePreAuthorization(string $id): ?PaymentoDTOResponse
```

### Parâmetros

- `$id`: ID da cobrança no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$cobrancaId = 'pay_000000000000';
$cobranca = Asaas::payment()->capturePreAuthorization($cobrancaId);
```

## Gerar QR Code PIX

Gera o QR Code PIX para uma cobrança existente.

### Método

```php
Asaas::payment()->getQrCodePix(string $paymentId): QrCodeDTO
```

### Parâmetros

- `$paymentId`: ID da cobrança no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$paymentId = 'pay_000000000000';
$pixQrCode = Asaas::payment()->getQrCodePix($paymentId);

// QR Code em base64
$qrCodeImage = $pixQrCode->encodedImage;

// Código copia e cola
$copyPaste = $pixQrCode->payload;

// Exibir QR Code em HTML
echo "<img src='data:image/png;base64,{$qrCodeImage}' alt='QR Code PIX' />";
echo "<p>Código: {$copyPaste}</p>";
```

## 📚 Referências

- [Documentação Oficial - Cobranças](https://docs.asaas.com/docs/cobrancas)
