# Metodos de AccountDocument

Assinaturas implementadas em `src/Methods/AccountDocument.php`.

## Indice

- [checkPendingDocuments](#checkpendingdocuments)
- [sendDocuments](#senddocuments)
- [viewDocumentSent](#viewdocumentsent)
- [updateSentDocument](#updatesentdocument)
- [removeSentDocument](#removesentdocument)

## checkPendingDocuments

```php
Asaas::accountDocument()->checkPendingDocuments(): CheckPendingDocumentsResponseDTO
```

## sendDocuments

```php
Asaas::accountDocument()->sendDocuments(
    string $id,
    SendDocumentRequestDTO $multipartData
): SendDocumentsResponseDTO
```

## viewDocumentSent

```php
Asaas::accountDocument()->viewDocumentSent(string $documentId): SendDocumentsResponseDTO
```

## updateSentDocument

```php
Asaas::accountDocument()->updateSentDocument(
    string $documentId,
    SendDocumentRequestDTO $multipartData
): SendDocumentsResponseDTO
```

## removeSentDocument

```php
Asaas::accountDocument()->removeSentDocument(
    string $documentId
): RemoveDocumentsResponseDTO
```


## Como montar os DTOs

### SendDocumentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AccountDocument\SendDocumentRequestDTO;

$dto = SendDocumentRequestDTO::fromArray([
    // Campos do documento
    // Ex.: 'file' => storage_path('app/documentos/arquivo.pdf'),
]);
```
