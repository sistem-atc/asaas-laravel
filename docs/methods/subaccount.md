# Metodos de Subaccount

Assinaturas implementadas em `src/Methods/Subaccount.php`.

## Indice

- [createSubaccount](#createsubaccount)
- [listSubaccounts](#listsubaccounts)
- [retrieveSingleSubaccount](#retrievesinglesubaccount)
- [createAPIkeyForSubaccount](#createapikeyforsubaccount)
- [listAPIkeysForSubaccount](#listapikeysforsubaccount)
- [updateAPIkeyForSubaccount](#updateapikeyforsubaccount)
- [deleteAPIkeyForSubaccount](#deleteapikeyforsubaccount)

## createSubaccount

```php
Asaas::subAccount()->createSubaccount(
    SubAccountRequestDTO $data
): SubAccountResponseDTO
```

## listSubaccounts

```php
Asaas::subAccount()->listSubaccounts(
    ListSubAccountRequestDTO $data
): ListSubAccountResponseDTO
```

## retrieveSingleSubaccount

```php
Asaas::subAccount()->retrieveSingleSubaccount(
    string $id
): SubAccountResponseDTO
```

## createAPIkeyForSubaccount

```php
Asaas::subAccount()->createAPIkeyForSubaccount(
    string $id,
    ApiKeySubAccountRequestDTO $data
): ApiKeySubAccountResponseDTO
```

## listAPIkeysForSubaccount

```php
Asaas::subAccount()->listAPIkeysForSubaccount(
    string $id
): ListAccessTokenResponseDTO
```

## updateAPIkeyForSubaccount

```php
Asaas::subAccount()->updateAPIkeyForSubaccount(
    string $id,
    string $accessTokenId,
    UpdateApiKeyRequestDTO $data
): UpdateApiKeySubAccountResponseDTO
```

## deleteAPIkeyForSubaccount

```php
Asaas::subAccount()->deleteAPIkeyForSubaccount(
    string $id,
    string $accessTokenId
): bool
```

## Como montar os DTOs

### SubAccountRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subaccount\SubAccountRequestDTO;
```

### ListSubAccountRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subaccount\ListSubAccountRequestDTO;
```

### ApiKeySubAccountRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subaccount\ApiKeySubAccountRequestDTO;
```

### UpdateApiKeyRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subaccount\UpdateApiKeyRequestDTO;
```
