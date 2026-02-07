# 🔄 Métodos de Assinatura (Subscription)

Documentação completa dos métodos disponíveis para gerenciamento de assinaturas.

## 📋 Índice

- [Criar Assinatura](#criar-assinatura)

## Criar Assinatura

Cria uma nova assinatura (cobrança recorrente).

### Método

```php
Asaas::subscription()->create(array $data): ?array
```

### Parâmetros

O método recebe um array com os dados da assinatura:

```php
$data = [
    'customer' => 'cus_000000000000',
    'billingType' => 'BOLETO',
    'value' => 99.90,
    'nextDueDate' => '2024-12-01',
    'cycle' => 'MONTHLY',
    'description' => 'Assinatura mensal',
];
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `customer` | string | Sim | ID do cliente |
| `billingType` | string | Sim | Tipo de cobrança (BOLETO, CREDIT_CARD, PIX) |
| `value` | float | Sim | Valor da assinatura |
| `nextDueDate` | string | Sim | Próxima data de vencimento (Y-m-d) |
| `cycle` | string | Sim | Ciclo (WEEKLY, MONTHLY, QUARTERLY, YEARLY) |
| `description` | string | Não | Descrição da assinatura |
| `externalReference` | string | Não | Referência externa |

### Ciclos Disponíveis

- `WEEKLY` - Semanal
- `MONTHLY` - Mensal
- `QUARTERLY` - Trimestral
- `YEARLY` - Anual

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$data = [
    'customer' => 'cus_000000000000',
    'billingType' => 'BOLETO',
    'value' => 99.90,
    'nextDueDate' => '2024-12-01',
    'cycle' => 'MONTHLY',
    'description' => 'Assinatura Premium Mensal',
    'externalReference' => 'SUB-001',
];

$assinatura = Asaas::subscription()->create($data);

if ($assinatura) {
    echo "Assinatura criada: " . $assinatura['id'];
    echo "Próximo vencimento: " . $assinatura['nextDueDate'];
}
```

### Exemplo com Cartão de Crédito

```php
use SistemAtc\Asaas\Facades\Asaas;

$data = [
    'customer' => 'cus_000000000000',
    'billingType' => 'CREDIT_CARD',
    'value' => 99.90,
    'nextDueDate' => '2024-12-01',
    'cycle' => 'MONTHLY',
    'description' => 'Assinatura Premium Mensal',
    'creditCard' => [
        'holderName' => 'João da Silva',
        'number' => '4111111111111111',
        'expiryMonth' => '12',
        'expiryYear' => '2025',
        'ccv' => '123',
    ],
    'creditCardHolderInfo' => [
        'name' => 'João da Silva',
        'email' => 'joao@example.com',
        'cpfCnpj' => '12345678900',
        'postalCode' => '01234567',
        'addressNumber' => '123',
        'phone' => '11999999999',
    ],
];

$assinatura = Asaas::subscription()->create($data);
```

## 📚 Referências

- [Documentação Oficial - Assinaturas](https://docs.asaas.com/docs/assinaturas)
