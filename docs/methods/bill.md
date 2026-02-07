# 🧾 Métodos de Conta (Bill)

Documentação completa dos métodos disponíveis para gerenciamento de contas (Pague Contas).

## 📋 Índice

- [Criar Conta](#criar-conta)
- [Listar Contas](#listar-contas)
- [Buscar Conta](#buscar-conta)
- [Simular Pagamento](#simular-pagamento)
- [Cancelar Conta](#cancelar-conta)

## Criar Conta

Cria uma nova conta para pagamento.

### Método

```php
Asaas::bill()->createBill(CreateBillDTO $data): BillResponseDTO
```

### Parâmetros

O método recebe um objeto `CreateBillDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillDTO;

$bill = CreateBillDTO::fromArray([
    'identificationField' => '12345678901234567890',
    'value' => 100.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de conta',
]);
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `identificationField` | string | Sim | Código de barras ou linha digitável |
| `scheduleDate` | DateTime | Não | Data de agendamento |
| `value` | float | Não | Valor da conta |
| `description` | string | Não | Descrição |
| `discount` | float | Não | Desconto |
| `interest` | float | Não | Juros |
| `fine` | float | Não | Multa |
| `dueDate` | DateTime | Não | Data de vencimento |
| `externalReference` | string | Não | Referência externa |

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillDTO;

$bill = CreateBillDTO::fromArray([
    'identificationField' => '34191090000000123456789012345678901234567890',
    'value' => 150.00,
    'dueDate' => '2024-12-31',
    'description' => 'Pagamento de conta de luz',
    'externalReference' => 'CONTA-001',
]);

$conta = Asaas::bill()->createBill($bill);

if ($conta) {
    echo "Conta criada: " . $conta->id;
    echo "Status: " . $conta->status;
}
```

## Listar Contas

Lista contas com filtros opcionais.

### Método

```php
Asaas::bill()->listBill(array $queryParams): ?array
```

### Parâmetros

O método recebe um array com os parâmetros de query:

```php
$queryParams = [
    'offset' => 0,
    'limit' => 100,
];
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$queryParams = [
    'offset' => 0,
    'limit' => 50,
];

$contas = Asaas::bill()->listBill($queryParams);
```

## Buscar Conta

Busca uma conta específica por ID.

### Método

```php
Asaas::bill()->retrieveSingleBill(string $id): ?array
```

### Parâmetros

- `$id`: ID da conta no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$contaId = 'bill_000000000000';
$conta = Asaas::bill()->retrieveSingleBill($contaId);
```

## Simular Pagamento

Simula o pagamento de uma conta.

### Método

```php
Asaas::bill()->simulateBillPayment(string $id, array $data): ?array
```

### Parâmetros

- `$id`: ID da conta no Asaas
- `$data`: Array com dados da simulação

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$contaId = 'bill_000000000000';
$data = [
    'paymentDate' => '2024-12-15',
];

$simulacao = Asaas::bill()->simulateBillPayment($contaId, $data);
```

## Cancelar Conta

Cancela uma conta.

### Método

```php
Asaas::bill()->cancelBill(string $id): ?array
```

### Parâmetros

- `$id`: ID da conta no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$contaId = 'bill_000000000000';
$resultado = Asaas::bill()->cancelBill($contaId);
```

## 📚 Referências

- [Documentação Oficial - Pague Contas](https://docs.asaas.com/docs/pague-contas)
