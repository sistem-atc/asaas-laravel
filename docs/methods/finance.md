# Metodos de Finance

Assinaturas implementadas em `src/Methods/Finance.php`.

## Indice

- [RetrieveAccountBalance](#retrieveaccountbalance)
- [collectionsStatistics](#collectionsstatistics)
- [retrieveSplitValues](#retrievesplitvalues)

## RetrieveAccountBalance

```php
Asaas::finance()->RetrieveAccountBalance(): BalanceResponseDTO
```

## collectionsStatistics

```php
Asaas::finance()->collectionsStatistics(
    CollectionStatisticsRequestDTO $queryParams
): CollectionStatisticsResponseDTO
```

## retrieveSplitValues

```php
Asaas::finance()->retrieveSplitValues(): CollectionStatisticsResponseDTO
```


## Como montar os DTOs

### CollectionStatisticsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Finance\CollectionStatisticsRequestDTO;

$dto = CollectionStatisticsRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
