# Metodos de Installment

Assinaturas implementadas em `src/Methods/Installment.php`.

## Indice

- [createInstallment](#createinstallment)
- [listInstallmentsCreateInstallmentWithCreditCard](#listinstallmentscreateinstallmentwithcreditcard)
- [createInstallmentWithCreditCard](#createinstallmentwithcreditcard)
- [retrieveSingleInstallment](#retrievesingleinstallment)
- [removeInstallment](#removeinstallment)
- [listPaymentsInstallment](#listpaymentsinstallment)
- [generateInstallmentBooklet](#generateinstallmentbooklet)
- [refundInstallment](#refundinstallment)
- [updateInstallmentSplits](#updateinstallmentsplits)
- [cancelChargesInstallment](#cancelchargesinstallment)

## createInstallment

```php
Asaas::installment()->createInstallment(
    CreateInstallmentRequestDTO $data
): InstallmentResponseDTO
```

## listInstallmentsCreateInstallmentWithCreditCard

```php
Asaas::installment()->listInstallmentsCreateInstallmentWithCreditCard(
    ListInstallmentRequestDTO $queryParams
): ListInstallmentResponseDTO
```

## createInstallmentWithCreditCard

```php
Asaas::installment()->createInstallmentWithCreditCard(
    CreateInstallmentWithCreditCardRequestDTO $data
): InstallmentResponseDTO
```

## retrieveSingleInstallment

```php
Asaas::installment()->retrieveSingleInstallment(string $id): InstallmentResponseDTO
```

## removeInstallment

```php
Asaas::installment()->removeInstallment(string $id): DeleteInstallmentResponseDTO
```

## listPaymentsInstallment

```php
Asaas::installment()->listPaymentsInstallment(
    string $id,
    ListPaymentInstallmentRequestDTO $queryParams
): ListPaymentInstallmentResponseDTO
```

## generateInstallmentBooklet

```php
Asaas::installment()->generateInstallmentBooklet(
    string $id,
    GenerateInstallmentBookletRequestDTO $queryParams
): FileResponseDTO
```

## refundInstallment

```php
Asaas::installment()->refundInstallment(
    string $id,
    RefundInstallmentRequestDTO $data
): InstallmentResponseDTO
```

## updateInstallmentSplits

```php
Asaas::installment()->updateInstallmentSplits(
    string $id,
    UpdateSplitInstallmentRequestDTO $data
): UpdateInstallmentSplitsResponseDTO
```

## cancelChargesInstallment

```php
Asaas::installment()->cancelChargesInstallment(
    string $id
): CancelChargesInstallmentResponseDTO
```


## Como montar os DTOs

### CreateInstallmentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\CreateInstallmentRequestDTO;

$dto = CreateInstallmentRequestDTO::fromArray([
    // Campos da criacao do parcelamento
]);
```

### ListInstallmentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\ListInstallmentRequestDTO;

$dto = ListInstallmentRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### CreateInstallmentWithCreditCardRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\CreateInstallmentWithCreditCardRequestDTO;

$dto = CreateInstallmentWithCreditCardRequestDTO::fromArray([
    // Campos do parcelamento com cartao
]);
```

### ListPaymentInstallmentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\ListPaymentInstallmentRequestDTO;

$dto = ListPaymentInstallmentRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### GenerateInstallmentBookletRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\GenerateInstallmentBookletRequestDTO;

$dto = GenerateInstallmentBookletRequestDTO::fromArray([
    // Ex.: filtros para gerar carnê
]);
```

### RefundInstallmentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\RefundInstallmentRequestDTO;

$dto = RefundInstallmentRequestDTO::fromArray([
    // Campos do estorno
]);
```

### UpdateSplitInstallmentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Installment\UpdateSplitInstallmentRequestDTO;

$dto = UpdateSplitInstallmentRequestDTO::fromArray([
    // Campos de divisao/split
]);
```
