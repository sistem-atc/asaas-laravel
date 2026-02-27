# Metodos de PaymentLink

Assinaturas implementadas em `src/Methods/PaymentLink.php`.

## Indice

- [createPaymentsLink](#createpaymentslink)
- [listPaymentsLinks](#listpaymentslinks)
- [updatePaymentsLink](#updatepaymentslink)
- [retrieveSinglePaymentsLink](#retrievesinglepaymentslink)
- [removePaymentsLink](#removepaymentslink)
- [restorePaymentsLink](#restorepaymentslink)
- [addImagePaymentsLink](#addimagepaymentslink)
- [listImagesPaymentsLink](#listimagespaymentslink)
- [retrieveSinglePaymentsLinkImage](#retrievesinglepaymentslinkimage)
- [removeImageFromPaymentsLink](#removeimagefrompaymentslink)
- [setPaymentsLinkMainImage](#setpaymentslinkmainimage)

## createPaymentsLink

```php
Asaas::paymentLink()->createPaymentsLink(
    PaymentLinkRequestDTO $data
): PaymentLinkResponseDTO
```

## listPaymentsLinks

```php
Asaas::paymentLink()->listPaymentsLinks(
    ListPaymentLinkRequestDTO $data
): ListPaymentLinkResponseDTO
```

## updatePaymentsLink

```php
Asaas::paymentLink()->updatePaymentsLink(
    string $id,
    PaymentLinkRequestDTO $data
): PaymentLinkResponseDTO
```

## retrieveSinglePaymentsLink

```php
Asaas::paymentLink()->retrieveSinglePaymentsLink(
    string $id
): PaymentLinkResponseDTO
```

## removePaymentsLink

```php
Asaas::paymentLink()->removePaymentsLink(string $id): DeletePaymentLinkResponseDTO
```

## restorePaymentsLink

```php
Asaas::paymentLink()->restorePaymentsLink(string $id): PaymentLinkResponseDTO
```

## addImagePaymentsLink

```php
Asaas::paymentLink()->addImagePaymentsLink(
    string $id,
    AddImagePaymentLinkRequestDTO $data
): ImagePaymentLinkResponseDTO
```

## listImagesPaymentsLink

```php
Asaas::paymentLink()->listImagesPaymentsLink(
    string $id
): ListImagePaymentLinkResponseDTO
```

## retrieveSinglePaymentsLinkImage

```php
Asaas::paymentLink()->retrieveSinglePaymentsLinkImage(
    string $paymentLinkId,
    string $imageId
): ImagePaymentLinkResponseDTO
```

## removeImageFromPaymentsLink

```php
Asaas::paymentLink()->removeImageFromPaymentsLink(
    string $paymentLinkId,
    string $imageId
): DeletePaymentLinkResponseDTO
```

## setPaymentsLinkMainImage

```php
Asaas::paymentLink()->setPaymentsLinkMainImage(
    string $paymentLinkId,
    string $imageId
): ImagePaymentLinkResponseDTO
```

## Como montar os DTOs

### PaymentLinkRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentLink\PaymentLinkRequestDTO;
```

### ListPaymentLinkRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentLink\ListPaymentLinkRequestDTO;
```

### AddImagePaymentLinkRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentLink\AddImagePaymentLinkRequestDTO;
```
