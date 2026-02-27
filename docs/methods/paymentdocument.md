# Metodos de PaymentDocument

Assinaturas implementadas em `src/Methods/PaymentDocument.php`.

## Indice

- [uploadPaymentDocuments](#uploadpaymentdocuments)
- [listDocumentsPayment](#listdocumentspayment)
- [updateSettingsaDocumentPayment](#updatesettingsadocumentpayment)
- [retrieveSingleDocumentPayment](#retrievesingledocumentpayment)
- [deleteDocumentFromPayment](#deletedocumentfrompayment)

## uploadPaymentDocuments

```php
Asaas::paymentDocument()->uploadPaymentDocuments(
    string $id,
    UploadPaymentDocumentRequestDTO $data
): PaymentDocumentResponseDTO
```

## listDocumentsPayment

```php
Asaas::paymentDocument()->listDocumentsPayment(
    string $id
): ListPaymentDocumentResponseDTO
```

## updateSettingsaDocumentPayment

```php
Asaas::paymentDocument()->updateSettingsaDocumentPayment(
    string $id,
    string $documentId,
    UpdateSettingsDocumentRequestDTO $data
): PaymentDocumentResponseDTO
```

## retrieveSingleDocumentPayment

```php
Asaas::paymentDocument()->retrieveSingleDocumentPayment(
    string $id,
    string $documentId
): PaymentDocumentResponseDTO
```

## deleteDocumentFromPayment

```php
Asaas::paymentDocument()->deleteDocumentFromPayment(
    string $id,
    string $documentId
): DeletePaymentDocumentResponseDTO
```

## Como montar os DTOs

### UploadPaymentDocumentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDocument\UploadPaymentDocumentRequestDTO;
```

### UpdateSettingsDocumentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\PaymentDocument\UpdateSettingsDocumentRequestDTO;
```
