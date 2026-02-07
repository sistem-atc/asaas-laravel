# 📈 Métodos de Antecipação

Documentação completa dos métodos disponíveis para antecipação de recebíveis.

## 📋 Índice

- [Solicitar Antecipação](#solicitar-antecipação)
- [Listar Antecipações](#listar-antecipações)
- [Buscar Antecipação](#buscar-antecipação)
- [Simular Antecipação](#simular-antecipação)
- [Configurar Antecipação Automática](#configurar-antecipação-automática)
- [Status da Antecipação Automática](#status-da-antecipação-automática)
- [Limites de Antecipação](#limites-de-antecipação)
- [Cancelar Antecipação](#cancelar-antecipação)

## Solicitar Antecipação

Solicita a antecipação de um recebível.

### Método

```php
Asaas::anticipation()->requestAntecipation(RequestAnticipationDTO $data): RetrieveAnticipationDTO
```

### Parâmetros

O método recebe um objeto `RequestAnticipationDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationDTO;

$anticipation = new RequestAnticipationDTO(
    installment: 'ins_000000000000', // ID da parcela
    payment: 'pay_000000000000',   // ID do pagamento
    documentFilePath: '/path/to/document.pdf', // Caminho do documento (opcional)
);
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `installment` | string | Não* | ID da parcela |
| `payment` | string | Não* | ID do pagamento |
| `documentFilePath` | string | Não | Caminho do arquivo do documento |

\* É necessário informar `installment` OU `payment`

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationDTO;

// Antecipar um pagamento específico
$anticipation = new RequestAnticipationDTO(
    payment: 'pay_000000000000',
    documentFilePath: storage_path('app/documents/anticipation.pdf'),
);

$resultado = Asaas::anticipation()->requestAntecipation($anticipation);

if ($resultado) {
    echo "Antecipação solicitada: " . $resultado->id;
    echo "Valor: R$ " . $resultado->value;
}
```

## Listar Antecipações

Lista antecipações com filtros opcionais.

### Método

```php
Asaas::anticipation()->listAntecipations(ListAnticipationFilterDTO $queryParams): ListAnticipationDTO
```

### Parâmetros

O método recebe um objeto `ListAnticipationFilterDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterDTO;
use SistemAtc\Asaas\Enum\AnticipationStatus;

$filter = ListAnticipationFilterDTO::fromArray([
    'offset' => 0,
    'limit' => 100,
    'payment' => 'pay_000000000000',
    'status' => AnticipationStatus::PENDING,
]);
```

### Campos de Filtro

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `offset` | int | Offset para paginação |
| `limit` | int | Limite de resultados |
| `payment` | string | ID do pagamento |
| `installment` | string | ID da parcela |
| `status` | AnticipationStatus | Status da antecipação |

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterDTO;

$filter = ListAnticipationFilterDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);

$antecipacoes = Asaas::anticipation()->listAntecipations($filter);
```

## Buscar Antecipação

Busca uma antecipação específica por ID.

### Método

```php
Asaas::anticipation()->retrieveSingleAntecipation(string $anticipationId): RetrieveAnticipationDTO
```

### Parâmetros

- `$anticipationId`: ID da antecipação no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$anticipationId = 'ant_000000000000';
$anticipation = Asaas::anticipation()->retrieveSingleAntecipation($anticipationId);
```

## Simular Antecipação

Simula uma antecipação para verificar valores e taxas.

### Método

```php
Asaas::anticipation()->simulateAntecipation(SimulateAnticipationDTO $data): ResponseSimulateAnticipationDTO
```

### Parâmetros

O método recebe um objeto `SimulateAnticipationDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationDTO;

$simulation = SimulateAnticipationDTO::fromArray([
    'installment' => 'ins_000000000000', // OU
    'payment' => 'pay_000000000000',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationDTO;

$simulation = SimulateAnticipationDTO::fromArray([
    'payment' => 'pay_000000000000',
]);

$resultado = Asaas::anticipation()->simulateAntecipation($simulation);

if ($resultado) {
    echo "Valor original: R$ " . $resultado->originalValue;
    echo "Valor líquido: R$ " . $resultado->netValue;
    echo "Taxa: R$ " . $resultado->fee;
}
```

## Configurar Antecipação Automática

Configura a antecipação automática de recebíveis.

### Método

```php
Asaas::anticipation()->updateStatusAutomaticAntecipation(UpdateAutomaticAnticipationDTO $data): AutomaticAnticipationConfigDTO
```

### Parâmetros

O método recebe um objeto `UpdateAutomaticAnticipationDTO`:

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationDTO;

$config = UpdateAutomaticAnticipationDTO::fromArray([
    'enabled' => true,
    'daysInAdvance' => 30,
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationDTO;

$config = UpdateAutomaticAnticipationDTO::fromArray([
    'enabled' => true,
    'daysInAdvance' => 30,
]);

$resultado = Asaas::anticipation()->updateStatusAutomaticAntecipation($config);
```

## Status da Antecipação Automática

Retorna o status atual da configuração de antecipação automática.

### Método

```php
Asaas::anticipation()->retrieveStatusAutomaticAntecipation(): AutomaticAnticipationConfigDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$status = Asaas::anticipation()->retrieveStatusAutomaticAntecipation();

if ($status->enabled) {
    echo "Antecipação automática está ativa";
    echo "Dias de antecedência: " . $status->daysInAdvance;
}
```

## Limites de Antecipação

Retorna os limites disponíveis para antecipação.

### Método

```php
Asaas::anticipation()->retrieveAntecipationLimits(): RetrieveAntecipationLimitsDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$limites = Asaas::anticipation()->retrieveAntecipationLimits();

echo "Limite disponível: R$ " . $limites->availableLimit;
echo "Limite total: R$ " . $limites->totalLimit;
```

## Cancelar Antecipação

Cancela uma antecipação solicitada.

### Método

```php
Asaas::anticipation()->cancelAntecipation(string $anticipationId): RetrieveAnticipationDTO
```

### Parâmetros

- `$anticipationId`: ID da antecipação no Asaas

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$anticipationId = 'ant_000000000000';
$resultado = Asaas::anticipation()->cancelAntecipation($anticipationId);
```

## 📚 Referências

- [Documentação Oficial - Antecipação](https://docs.asaas.com/docs/antecipacao)
