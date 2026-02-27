# Metodos de Webhook

Assinaturas implementadas em `src/Methods/Webhook.php`.

## Indice

- [createNewWebhook](#createnewwebhook)
- [listWebhooks](#listwebhooks)
- [retrieveSingleWebhook](#retrievesinglewebhook)
- [updateExistingWebhook](#updateexistingwebhook)
- [removeWebhook](#removewebhook)
- [removeWebhookBackoff](#removewebhookbackoff)

## createNewWebhook

```php
Asaas::webhook()->createNewWebhook(
    CreateRequestDTO $data
): WebhookResponseDTO
```

## listWebhooks

```php
Asaas::webhook()->listWebhooks(
    ListWebhooksRequestDTO $data
): ListWebhookResponseDTO
```

## retrieveSingleWebhook

```php
Asaas::webhook()->retrieveSingleWebhook(
    string $id
): WebhookResponseDTO
```

## updateExistingWebhook

```php
Asaas::webhook()->updateExistingWebhook(
    string $id,
    UpdateWebhookRequestDTO $data
): WebhookResponseDTO
```

## removeWebhook

```php
Asaas::webhook()->removeWebhook(string $id): DeleteWebhookResponseDTO
```

## removeWebhookBackoff

```php
Asaas::webhook()->removeWebhookBackoff(string $id): bool
```

## Como montar os DTOs

### CreateRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Webhook\CreateRequestDTO;
```

### ListWebhooksRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Webhook\ListWebhooksRequestDTO;
```

### UpdateWebhookRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Webhook\UpdateWebhookRequestDTO;
```
