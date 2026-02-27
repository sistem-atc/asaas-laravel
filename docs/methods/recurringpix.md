# Metodos de RecurringPix

Assinaturas implementadas em `src/Methods/RecurringPix.php`.

## Indice

- [listRecurrences](#listrecurrences)
- [retrieveSingleRecurrence](#retrievesinglerecurrence)
- [cancelRecurrence](#cancelrecurrence)
- [listRecurrenceItems](#listrecurrenceitems)
- [cancelRecurrenceItem](#cancelrecurrenceitem)

## listRecurrences

```php
Asaas::recurringPix()->listRecurrences(
    ListRecurrencesRequestDTO $data
): ListRecurrenceResponseDTO
```

## retrieveSingleRecurrence

```php
Asaas::recurringPix()->retrieveSingleRecurrence(
    string $id
): SingleRecurrenceResponseDTO
```

## cancelRecurrence

```php
Asaas::recurringPix()->cancelRecurrence(
    string $id
): SingleRecurrenceResponseDTO
```

## listRecurrenceItems

```php
Asaas::recurringPix()->listRecurrenceItems(
    string $id,
    ListRecurrencesItemsRequestDTO $data
): ListItemsRecurrenceResponseDTO
```

## cancelRecurrenceItem

```php
Asaas::recurringPix()->cancelRecurrenceItem(
    string $id
): SingleRecurrenceResponseDTO
```

## Como montar os DTOs

### ListRecurrencesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\RecurringPix\ListRecurrencesRequestDTO;
```

### ListRecurrencesItemsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\RecurringPix\ListRecurrencesItemsRequestDTO;
```
