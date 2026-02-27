# Metodos de PixTransaction

Assinaturas implementadas em `src/Methods/PixTransaction.php`.

## Indice

- [payQRCode](#payqrcode)
- [decodeQRCodePayment](#decodeqrcodepayment)
- [retrieveSingleTransaction](#retrievesingletransaction)
- [listTransactions](#listtransactions)
- [cancelScheduledTransaction](#cancelscheduledtransaction)

## payQRCode

```php
Asaas::pixTransaction()->payQRCode(
    PayQrCodeRequestDTO $data
): PayQrCodeResponseDTO
```

## decodeQRCodePayment

```php
Asaas::pixTransaction()->decodeQRCodePayment(
    DecodeQrCodeRequestDTO $data
): DecodeQrCodeResponseDTO
```

## retrieveSingleTransaction

```php
Asaas::pixTransaction()->retrieveSingleTransaction(
    string $id
): PayQrCodeResponseDTO
```

## listTransactions

```php
Asaas::pixTransaction()->listTransactions(
    ListTransactionsRequestDTO $data
): ListTransactionResponseDTO
```

## cancelScheduledTransaction

```php
Asaas::pixTransaction()->cancelScheduledTransaction(
    string $id
): PayQrCodeResponseDTO
```

## Como montar os DTOs

### PayQrCodeRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PixTransaction\PayQrCodeRequestDTO;
```

### DecodeQrCodeRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PixTransaction\DecodeQrCodeRequestDTO;
```

### ListTransactionsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PixTransaction\ListTransactionsRequestDTO;
```
