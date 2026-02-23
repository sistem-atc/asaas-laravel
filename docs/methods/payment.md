# Metodos de Payment (Cobrancas)

Assinaturas implementadas em `src/Methods/Payment.php`.

## Indice

- [createNewPayment](#createnewpayment)
- [listPayments](#listpayments)
- [createNewPaymentWithCreditCard](#createnewpaymentwithcreditcard)
- [CapturePaymentWithPreAuthorization](#capturepaymentwithpreauthorization)
- [payChargeWithCreditCard](#paychargewithcreditcard)
- [retrievePaymentBillingInformation](#retrievepaymentbillinginformation)
- [getQRCodeForPixPayments](#getqrcodeforpixpayments)

## createNewPayment

```php
Asaas::payment()->createNewPayment(
    CreatePaymentRequestDTO $data
): PaymentResponseDTO
```

## listPayments

```php
Asaas::payment()->listPayments(
    ListPaymentRequestDTO $queryParams
): ListPaymentResponseDTO
```

## createNewPaymentWithCreditCard

```php
Asaas::payment()->createNewPaymentWithCreditCard(
    CreditCardPaymentRequestDTO $data
): PaymentResponseDTO
```

## CapturePaymentWithPreAuthorization

```php
Asaas::payment()->CapturePaymentWithPreAuthorization(
    string $id
): PaymentResponseDTO
```

## payChargeWithCreditCard

```php
Asaas::payment()->payChargeWithCreditCard(
    string $id,
    PayChargeWithCreditCardRequestDTO $data
): PaymentResponseDTO
```

## retrievePaymentBillingInformation

```php
Asaas::payment()->retrievePaymentBillingInformation(
    string $id
): PaymentBilingInformationResponseDTO
```

## getQRCodeForPixPayments

```php
Asaas::payment()->getQRCodeForPixPayments(
    string $id
): QrCodeResponseDTO
```

## Observacao

Os seguintes metodos existem na classe, mas ainda estao sem implementacao no codigo:
`paymentViewingInformation`, `retrieveSinglePayment`, `updateExistingPayment`,
`deletePayment`, `restoreRemovedPayment`, `retrieveStatusPayment`, `refundPayment`,
`getDigitableBillLine`, `confirmCashReceipt`, `undoCashReceipt`, `salesSimulator`,
`recoveryPaymentLimit`.

## Referencia

- [Documentacao Oficial - Cobrancas](https://docs.asaas.com/docs/cobrancas)

## Como montar os DTOs

### CreatePaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;

$dto = CreatePaymentRequestDTO::fromArray([
    'customer' => 'cus_xxx',
    'billingType' => 'PIX',
    'value' => 100.00,
    'dueDate' => '2026-02-23',
]);
```

### ListPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;

$dto = ListPaymentRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### CreditCardPaymentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentRequestDTO;

$dto = CreditCardPaymentRequestDTO::fromArray([
    // Campos da cobranca com cartao
]);
```

### PayChargeWithCreditCardRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Payment\PayChargeWithCreditCardRequestDTO;

$dto = PayChargeWithCreditCardRequestDTO::fromArray([
    // Campos para pagamento de cobranca existente com cartao
]);
```
