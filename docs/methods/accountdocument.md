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

## Referencia

- [Documentacao Oficial - Envio de Documentos](https://docs.asaas.com/docs/envio-de-documentos)

## Como montar os DTOs

### SendDocumentRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AccountDocument\SendDocumentRequestDTO;
use SistemAtc\Asaas\Enum\TypePendingDocument;

$dto = SendDocumentRequestDTO::fromArray([
    'filePath' => storage_path('app/documentos/arquivo.pdf'),
    'type' => TypePendingDocument::CPF,
]);
```
