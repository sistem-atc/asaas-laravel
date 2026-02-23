# Metodos de Bill (Pague Contas)

Assinaturas implementadas em `src/Methods/Bill.php`.

## Indice

- [createBill](#createbill)
- [listBill](#listbill)
- [simulateBillPayment](#simulatebillpayment)
- [retrieveSingleBill](#retrievesinglebill)
- [cancelBill](#cancelbill)

## createBill

```php
Asaas::bill()->createBill(CreateBillRequestDTO $data): BillResponseDTO
```

## listBill

```php
Asaas::bill()->listBill(
    ListBillPaymentsFilterRequestDTO $queryParams
): ListBillResponseDTO
```

## simulateBillPayment

```php
Asaas::bill()->simulateBillPayment(
    SimulateBillPaymentRequestDTO $data
): SimulateBillPaymentResponseDTO
```

## retrieveSingleBill

```php
Asaas::bill()->retrieveSingleBill(string $id): BillResponseDTO
```

## cancelBill

```php
Asaas::bill()->cancelBill(string $id): BillResponseDTO
```

## Referencia

- [Documentacao Oficial - Pague Contas](https://docs.asaas.com/docs/pague-contas)

## Como montar os DTOs

### CreateBillRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillRequestDTO;

$dto = CreateBillRequestDTO::fromArray([
    'identificationField' => '34191...',
    'description' => 'Pagamento de conta',
]);
```

### ListBillPaymentsFilterRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Bill\ListBillPaymentsFilterRequestDTO;

$dto = ListBillPaymentsFilterRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### SimulateBillPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Bill\SimulateBillPaymentRequestDTO;

$dto = SimulateBillPaymentRequestDTO::fromArray([
    'identificationField' => '34191...',
]);
```
