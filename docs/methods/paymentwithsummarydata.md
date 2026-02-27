# Metodos de PaymentWithSummaryData

Assinaturas implementadas em `src/Methods/PaymentWithSummaryData.php`.

## Indice

- [createNewPaymentWithSummaryDataResponse](#createnewpaymentwithsummarydataresponse)
- [listPaymentsWithSummaryData](#listpaymentswithsummarydata)
- [createNewPaymentWithCreditCardWithSummaryDataInResponse](#createnewpaymentwithcreditcardwithsummarydatainresponse)
- [capturePaymentWithPreAuthorizationWithSummaryDataInResponse](#capturepaymentwithpreauthorizationwithsummarydatainresponse)
- [retrieveSinglePaymentWithSummaryData](#retrievesinglepaymentwithsummarydata)
- [updateExistingPaymentWithSummaryDataInResponse](#updateexistingpaymentwithsummarydatainresponse)
- [deletePaymentWithSummaryData](#deletepaymentwithsummarydata)
- [restoreRemovedPaymentWithSummaryDataInResponse](#restoreremovedpaymentwithsummarydatainresponse)
- [refundPaymentWithSummaryDataInResponse](#refundpaymentwithsummarydatainresponse)
- [confirmCashReceiptWithSummaryDataInResponse](#confirmcashreceiptwithsummarydatainresponse)
- [undoCashReceiptConfirmationWithSummaryDataInResponse](#undocashreceiptconfirmationwithsummarydatainresponse)

## createNewPaymentWithSummaryDataResponse

```php
Asaas::paymentWithSummaryData()->createNewPaymentWithSummaryDataResponse(
    CreatePaymentRequestDTO $data
): PaymentWithSummaryResponseDTO
```

## listPaymentsWithSummaryData

```php
Asaas::paymentWithSummaryData()->listPaymentsWithSummaryData(
    ListPaymentRequestDTO $data
): ListPaymentWithSummaryResponseDTO
```

## createNewPaymentWithCreditCardWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->createNewPaymentWithCreditCardWithSummaryDataInResponse(
    CreditCardPaymentRequestDTO $data
): PaymentWithSummaryCreditCardResponseDTO
```

## capturePaymentWithPreAuthorizationWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->capturePaymentWithPreAuthorizationWithSummaryDataInResponse(
    string $id
): PaymentWithSummaryResponseDTO
```

## retrieveSinglePaymentWithSummaryData

```php
Asaas::paymentWithSummaryData()->retrieveSinglePaymentWithSummaryData(
    string $id
): PaymentWithSummaryResponseDTO
```

## updateExistingPaymentWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->updateExistingPaymentWithSummaryDataInResponse(
    string $id
): PaymentWithSummaryResponseDTO
```

## deletePaymentWithSummaryData

```php
Asaas::paymentWithSummaryData()->deletePaymentWithSummaryData(
    string $id
): DeletePaymentSummaryResponseDTO
```

## restoreRemovedPaymentWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->restoreRemovedPaymentWithSummaryDataInResponse(
    string $id
): PaymentWithSummaryResponseDTO
```

## refundPaymentWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->refundPaymentWithSummaryDataInResponse(
    string $id,
    RefundPaymentRequestDTO $data
): PaymentWithSummaryResponseDTO
```

## confirmCashReceiptWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->confirmCashReceiptWithSummaryDataInResponse(
    string $id,
    ConfirmCashRequestDTO $data
): PaymentWithSummaryResponseDTO
```

## undoCashReceiptConfirmationWithSummaryDataInResponse

```php
Asaas::paymentWithSummaryData()->undoCashReceiptConfirmationWithSummaryDataInResponse(
    string $id
): PaymentWithSummaryResponseDTO
```

## Como montar os DTOs

### CreatePaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;
```

### ListPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
```

### CreditCardPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentRequestDTO;
```

### RefundPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\RefundPaymentRequestDTO;
```

### ConfirmCashRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\ConfirmCashRequestDTO;
```
