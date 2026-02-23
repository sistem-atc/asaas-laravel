# Metodos de Chargeback

Assinaturas implementadas em `src/Methods/Chargeback.php`.

## Indice

- [createChargebackDispute](#createchargebackdispute)
- [listChargebacks](#listchargebacks)
- [retrieveSingleChargeback](#retrievesinglechargeback)

## createChargebackDispute

```php
Asaas::chargeback()->createChargebackDispute(
    string $id,
    CreateChargebackDisputeRequestDTO $data
): ChargebackDisputeResponseDTO
```

## listChargebacks

```php
Asaas::chargeback()->listChargebacks(
    ListChargebacksRequestDTO $queryParams
): ListChargebackResponseDTO
```

## retrieveSingleChargeback

```php
Asaas::chargeback()->retrieveSingleChargeback(?string $id): ChargebackResponseDTO
```


## Como montar os DTOs

### CreateChargebackDisputeRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Chargeback\CreateChargebackDisputeRequestDTO;

$dto = CreateChargebackDisputeRequestDTO::fromArray([
    // Campos da contestacao
]);
```

### ListChargebacksRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Chargeback\ListChargebacksRequestDTO;

$dto = ListChargebacksRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
