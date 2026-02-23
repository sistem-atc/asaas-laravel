# Metodos de PaymentRefund

Assinaturas implementadas em `src/Methods/PaymentRefund.php`.

## Indice

- [retrieveRefundsSinglePayment](#retrieverefundssinglepayment)
- [refundBankSlip](#refundbankslip)

## retrieveRefundsSinglePayment

```php
Asaas::paymentRefund()->retrieveRefundsSinglePayment(
    string $id
): RetrieveSinglePaymentResponseDTO
```

## refundBankSlip

```php
Asaas::paymentRefund()->refundBankSlip(string $id): RefundBankSlipResponseDTO
```

## Como montar os DTOs

Este modulo nao recebe DTO de entrada nos metodos implementados atualmente.
As operacoes usam apenas `string $id` como parametro.
