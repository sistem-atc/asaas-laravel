# Metodos de PaymentDunning

Assinaturas implementadas em `src/Methods/PaymentDunning.php`.

## Indice

- [createPaymentDunning](#createpaymentdunning)
- [listPaymentDunnings](#listpaymentdunnings)
- [simulatePaymentDunning](#simulatepaymentdunning)
- [recoverSinglePaymentDunning](#recoversinglepaymentdunning)
- [eventHistoryLists](#eventhistorylists)
- [listPaymentsReceived](#listpaymentsreceived)
- [listPaymentsAvailablePaymentDunning](#listpaymentsavailablepaymentdunning)
- [resendDocuments](#resenddocuments)
- [cancelPaymentDunning](#cancelpaymentdunning)

## createPaymentDunning

```php
Asaas::paymentDunning()->createPaymentDunning(
    PaymentDunningRequestDTO $data
): PaymentDunningResponseDTO
```

## listPaymentDunnings

```php
Asaas::paymentDunning()->listPaymentDunnings(
    ListPaymentDunningRequestDTO $data
): ListPaymentDunningResponseDTO
```

## simulatePaymentDunning

```php
Asaas::paymentDunning()->simulatePaymentDunning(
    SimulatePaymentDunningRequestDTO $data
): SimulatePaymentDunningResponseDTO
```

## recoverSinglePaymentDunning

```php
Asaas::paymentDunning()->recoverSinglePaymentDunning(
    string $id
): PaymentDunningResponseDTO
```

## eventHistoryLists

```php
Asaas::paymentDunning()->eventHistoryLists(
    string $id,
    ListsDunningRequestDTO $data
): HistoryListResponseDTO
```

## listPaymentsReceived

```php
Asaas::paymentDunning()->listPaymentsReceived(
    string $id,
    ListsDunningRequestDTO $data
): ListPaymentReceivedResponseDTO
```

## listPaymentsAvailablePaymentDunning

```php
Asaas::paymentDunning()->listPaymentsAvailablePaymentDunning(
    ListsDunningRequestDTO $data
): ListPaymentsAvaliableResponseDTO
```

## resendDocuments

```php
Asaas::paymentDunning()->resendDocuments(
    string $id,
    ResendDocumentRequestDTO $data
): PaymentDunningResponseDTO
```

## cancelPaymentDunning

```php
Asaas::paymentDunning()->cancelPaymentDunning(
    string $id
): PaymentDunningResponseDTO
```

## Como montar os DTOs

### PaymentDunningRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDunning\PaymentDunningRequestDTO;
```

### ListPaymentDunningRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListPaymentDunningRequestDTO;
```

### SimulatePaymentDunningRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDunning\SimulatePaymentDunningRequestDTO;
```

### ListsDunningRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListsDunningRequestDTO;
```

### ResendDocumentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ResendDocumentRequestDTO;
```
