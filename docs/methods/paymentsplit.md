# Metodos de PaymentSplit

Assinaturas implementadas em `src/Methods/PaymentSplit.php`.

## Indice

- [retrieveSinglePaidSplit](#retrievesinglepaidsplit)
- [listPaidSplits](#listpaidsplits)
- [retrieveSingleReceivedSplit](#retrievesinglereceivedsplit)
- [listReceivedSplits](#listreceivedsplits)

## retrieveSinglePaidSplit

```php
Asaas::paymentSplit()->retrieveSinglePaidSplit(string $id): Split
```

## listPaidSplits

```php
Asaas::paymentSplit()->listPaidSplits(
    ListSplitsRequestDTO $data
): ListSplitResponseDTO
```

## retrieveSingleReceivedSplit

```php
Asaas::paymentSplit()->retrieveSingleReceivedSplit(string $id): Split
```

## listReceivedSplits

```php
Asaas::paymentSplit()->listReceivedSplits(
    ListSplitsRequestDTO $data
): ListSplitResponseDTO
```

## Como montar os DTOs

### ListSplitsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentSplit\ListSplitsRequestDTO;
```
