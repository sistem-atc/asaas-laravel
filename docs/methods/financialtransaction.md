# Metodos de FinancialTransaction

Assinaturas implementadas em `src/Methods/FinancialTransaction.php`.

## Indice

- [retrieveExtract](#retrieveextract)

## retrieveExtract

```php
Asaas::financialTransaction()->retrieveExtract(
    RetrieveExtractRequestDTO $queryParams
): RetrieveExtractResponseDTO
```


## Como montar os DTOs

### RetrieveExtractRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FinancialTransaction\RetrieveExtractRequestDTO;

$dto = RetrieveExtractRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
