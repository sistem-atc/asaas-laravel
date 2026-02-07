# 👥 Métodos de Cliente (Customer)

Documentação completa dos métodos disponíveis para gerenciamento de clientes.

## 📋 Índice

- [Criar Cliente](#criar-cliente)
- [Listar Clientes](#listar-clientes)
- [Buscar Cliente](#buscar-cliente)
- [Atualizar Cliente](#atualizar-cliente)
- [Remover Cliente](#remover-cliente)
- [Restaurar Cliente](#restaurar-cliente)
- [Notificações do Cliente](#notificações-do-cliente)

## Criar Cliente

Cria um novo cliente no Asaas.

### Método

```php
Asaas::customer()->create(AsaasCustomer $customer): ?CustomerCreateDTO
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` que pode ser criado usando `fromArray()`:

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'name' => 'João da Silva',
    'email' => 'joao@example.com',
    'cpfCnpj' => '12345678900',
    'mobilePhone' => '11999999999',
    'address' => 'Rua Exemplo',
    'addressNumber' => '123',
    'province' => 'Centro',
    'postalCode' => '01234567',
    'externalReference' => 'CLI-001', // ID do cliente no seu sistema
    'notificationDisable' => false,
]);
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `name` | string | Sim | Nome completo do cliente |
| `cpfCnpj` | string | Sim | CPF ou CNPJ (apenas números) |
| `email` | string | Não | Email do cliente |
| `phone` | string | Não | Telefone fixo |
| `mobilePhone` | string | Não | Telefone celular |
| `address` | string | Não | Endereço |
| `addressNumber` | string | Não | Número do endereço |
| `complement` | string | Não | Complemento |
| `province` | string | Não | Bairro |
| `postalCode` | string | Não | CEP (apenas números) |
| `externalReference` | string | Não | Referência externa (ID do seu sistema) |
| `notificationDisable` | bool | Não | Desabilitar notificações |
| `additionalEmails` | string | Não | Emails adicionais (separados por vírgula) |
| `municipalInscription` | string | Não | Inscrição municipal |
| `stateInscription` | string | Não | Inscrição estadual |
| `observations` | string | Não | Observações |
| `groupName` | string | Não | Nome do grupo |
| `company` | string | Não | Nome da empresa |
| `foreignCustomer` | bool | Não | Cliente estrangeiro |

### Exemplo Completo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customerData = AsaasCustomer::fromArray([
    'name' => 'João da Silva',
    'email' => 'joao@example.com',
    'cpfCnpj' => '12345678900',
    'mobilePhone' => '11999999999',
    'address' => 'Rua das Flores',
    'addressNumber' => '123',
    'complement' => 'Apto 45',
    'province' => 'Centro',
    'postalCode' => '01234567',
    'externalReference' => 'CLI-001',
]);

$cliente = Asaas::customer()->create($customerData);

if ($cliente) {
    echo "Cliente criado com ID: " . $cliente->id;
}
```

### Resposta

Retorna um objeto `CustomerCreateDTO` com os dados do cliente criado, ou `null` em caso de erro.

## Listar Clientes

Lista clientes com filtros opcionais.

### Método

```php
Asaas::customer()->list(ListCustomer $filter): ?array
```

### Parâmetros

O método recebe um objeto `ListCustomer` para filtrar os resultados:

```php
use SistemAtc\Asaas\DTO\Shared\Request\ListCustomer;

$filter = ListCustomer::fromArray([
    'offset' => 0,
    'limit' => 100,
    'name' => 'João',
    'email' => 'joao@example.com',
    'cpfCnpj' => '12345678900',
    'groupName' => 'Grupo A',
    'externalReference' => 'CLI-001',
]);
```

### Campos de Filtro

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `offset` | int | Offset para paginação (padrão: 0) |
| `limit` | int | Limite de resultados (padrão: 100) |
| `name` | string | Filtrar por nome |
| `email` | string | Filtrar por email |
| `cpfCnpj` | string | Filtrar por CPF/CNPJ |
| `groupName` | string | Filtrar por grupo |
| `externalReference` | string | Filtrar por referência externa |

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\ListCustomer;

// Listar todos os clientes
$filter = ListCustomer::fromArray([
    'offset' => 0,
    'limit' => 50,
]);

$clientes = Asaas::customer()->list($filter);

// Filtrar por email
$filter = ListCustomer::fromArray([
    'email' => 'joao@example.com',
]);

$cliente = Asaas::customer()->list($filter);
```

## Buscar Cliente

Busca um cliente específico por ID.

### Método

```php
Asaas::customer()->single_customer(AsaasCustomer $customer): ?array
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` com o `asaas_id` preenchido:

```php
$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);

$cliente = Asaas::customer()->single_customer($customer);
```

## Atualizar Cliente

Atualiza os dados de um cliente existente.

### Método

```php
Asaas::customer()->update(AsaasCustomer $customer): ?array
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` com o `asaas_id` e os campos a serem atualizados:

```php
$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
    'name' => 'João Silva Santos',
    'email' => 'joao.novo@example.com',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
    'name' => 'João Silva Santos',
    'email' => 'joao.novo@example.com',
    'mobilePhone' => '11988888888',
]);

$clienteAtualizado = Asaas::customer()->update($customer);
```

## Remover Cliente

Remove um cliente do Asaas.

### Método

```php
Asaas::customer()->remove(AsaasCustomer $customer): ?array
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` com o `asaas_id`:

```php
$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);

$resultado = Asaas::customer()->remove($customer);
```

## Restaurar Cliente

Restaura um cliente que foi removido.

### Método

```php
Asaas::customer()->restore(AsaasCustomer $customer): ?array
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` com o `asaas_id`:

```php
$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);

$clienteRestaurado = Asaas::customer()->restore($customer);
```

## Notificações do Cliente

Lista as notificações de um cliente.

### Método

```php
Asaas::customer()->notifications(AsaasCustomer $customer): ?array
```

### Parâmetros

O método recebe um objeto `AsaasCustomer` com o `asaas_id`:

```php
$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

$customer = AsaasCustomer::fromArray([
    'asaas_id' => 'cus_000000000000',
]);

$notificacoes = Asaas::customer()->notifications($customer);
```

## 📚 Referências

- [Documentação Oficial - Clientes](https://docs.asaas.com/docs/clientes)
