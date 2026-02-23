# Metodos de AutomaticPix

Assinaturas implementadas em `src/Methods/AutomaticPix.php`.

## Indice

- [createAuthorization](#createauthorization)
- [listAuthorization](#listauthorization)
- [retrieveSingleAuthorization](#retrievesingleauthorization)
- [cancelAuthorization](#cancelauthorization)
- [retrieveSinglePaymentInstruction](#retrievesinglepaymentinstruction)
- [listPaymentInstruction](#listpaymentinstruction)

## createAuthorization

```php
Asaas::automaticPix()->createAuthorization(
    CreateAuthorizationRequestDTO $data
): CreateAuthorizationResponseDTO
```

## listAuthorization

```php
Asaas::automaticPix()->listAuthorization(
    ListAuthorizationRequestDTO $queryParams
): ListAuthorizationResponseDTO
```

## retrieveSingleAuthorization

```php
Asaas::automaticPix()->retrieveSingleAuthorization(
    string $id
): CreateAuthorizationResponseDTO
```

## cancelAuthorization

```php
Asaas::automaticPix()->cancelAuthorization(string $id): CreateAuthorizationResponseDTO
```

## retrieveSinglePaymentInstruction

```php
Asaas::automaticPix()->retrieveSinglePaymentInstruction(
    string $id
): SinglePaymentResponseDTO
```

## listPaymentInstruction

```php
Asaas::automaticPix()->listPaymentInstruction(
    ListAuthorizationPaymentsRequestDTO $queryParams
): ListAuthorizationPaymentResponseDTO
```


## Como montar os DTOs

### CreateAuthorizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\CreateAuthorizationRequestDTO;

$dto = CreateAuthorizationRequestDTO::fromArray([
    // Campos da autorizacao Pix Automático
]);
```

### ListAuthorizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationRequestDTO;

$dto = ListAuthorizationRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### ListAuthorizationPaymentsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationPaymentsRequestDTO;

$dto = ListAuthorizationPaymentsRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
