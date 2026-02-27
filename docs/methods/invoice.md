# Metodos de Invoice

Assinaturas implementadas em `src/Methods/Invoice.php`.

## Indice

- [scheduleInvoice](#scheduleinvoice)
- [listInvoices](#listinvoices)
- [updateInvoice](#updateinvoice)
- [retrieveSingleInvoice](#retrievesingleinvoice)
- [issueInvoice](#issueinvoice)
- [cancelInvoice](#cancelinvoice)

## scheduleInvoice

```php
Asaas::invoice()->scheduleInvoice(
    ScheduleInvoiceRequestDTO $data
): InvoiceResponseDTO
```

## listInvoices

```php
Asaas::invoice()->listInvoices(
    ListInvoicesRequestDTO $data
): ListInvoiceResponseDTO
```

## updateInvoice

```php
Asaas::invoice()->updateInvoice(
    string $id,
    UpdateInvoiceRequestDTO $data
): InvoiceResponseDTO
```

## retrieveSingleInvoice

```php
Asaas::invoice()->retrieveSingleInvoice(string $id): InvoiceResponseDTO
```

## issueInvoice

```php
Asaas::invoice()->issueInvoice(string $id): InvoiceResponseDTO
```

## cancelInvoice

```php
Asaas::invoice()->cancelInvoice(
    string $id,
    CancelInvoiceRequestDTO $data
): InvoiceResponseDTO
```

## Como montar os DTOs

### ScheduleInvoiceRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Invoice\ScheduleInvoiceRequestDTO;
```

### ListInvoicesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Invoice\ListInvoicesRequestDTO;
```

### UpdateInvoiceRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Invoice\UpdateInvoiceRequestDTO;
```

### CancelInvoiceRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Invoice\CancelInvoiceRequestDTO;
```
