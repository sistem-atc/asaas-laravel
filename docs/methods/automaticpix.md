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

## Referencia

- [Documentacao Oficial - Pix Automatico](https://docs.asaas.com/docs/pix-automatico)

## Como montar os DTOs

### CreateAuthorizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\CreateAuthorizationRequestDTO;
use SistemAtc\Asaas\DTO\Shared\Request\ImmediateQrCode;
use SistemAtc\Asaas\Enum\Frequency;

$dto = CreateAuthorizationRequestDTO::fromArray([
    'frequency' => Frequency::MONTHLY,
    'contractId' => 'contract_123',
    'startDate' => '2026-02-01',
    'customerId' => 'cus_123',
    'immediateQrCode' => ImmediateQrCode::fromArray([
        'expirationSeconds' => 600,
        'originalValue' => 120.50,
        'description' => 'Assinatura mensal',
    ]),
]);
```

### ListAuthorizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationRequestDTO;
use SistemAtc\Asaas\Enum\StatusPix;

$dto = ListAuthorizationRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
    'status' => StatusPix::ACTIVE,
]);
```

### ListAuthorizationPaymentsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationPaymentsRequestDTO;
use SistemAtc\Asaas\Enum\StatusPixPayment;

$dto = ListAuthorizationPaymentsRequestDTO::fromArray([
    'authorizationId' => 'aut_123',
    'customerId' => 'cus_123',
    'status' => StatusPixPayment::SCHEDULED,
]);
```
