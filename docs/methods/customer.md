# Metodos de Customer (Clientes)

Assinaturas implementadas em `src/Methods/Customer.php`.

## Indice

- [createNewCustomer](#createnewcustomer)
- [listCustomers](#listcustomers)
- [retrieveSingleCustomer](#retrievesinglecustomer)
- [updateExistingCustomer](#updateexistingcustomer)
- [removeCustomer](#removecustomer)
- [restoreRemovedCustomer](#restoreremovedcustomer)
- [retrieveNotificationsFromCustomer](#retrievenotificationsfromcustomer)

## createNewCustomer

```php
Asaas::customer()->createNewCustomer(
    CustomerRequestDTO $customer
): CustomerCreateResponseDTO
```

## listCustomers

```php
Asaas::customer()->listCustomers(
    ListCustomerRequestDTO $queryParams
): ListCustomerResponseDTO
```

## retrieveSingleCustomer

```php
Asaas::customer()->retrieveSingleCustomer(string $id): CustomerCreateResponseDTO
```

## updateExistingCustomer

```php
Asaas::customer()->updateExistingCustomer(
    CustomerRequestDTO $customer
): CustomerCreateResponseDTO
```

## removeCustomer

```php
Asaas::customer()->removeCustomer(string $id): RemoveCustomerResponseDTO
```

## restoreRemovedCustomer

```php
Asaas::customer()->restoreRemovedCustomer(string $id): CustomerCreateResponseDTO
```

## retrieveNotificationsFromCustomer

```php
Asaas::customer()->retrieveNotificationsFromCustomer(
    string $id
): RetrieveNotificationCustomerResponseDTO
```

## Referencia

- [Documentacao Oficial - Clientes](https://docs.asaas.com/docs/clientes)

## Como montar os DTOs

### CustomerRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Customer\CustomerRequestDTO;

$dto = CustomerRequestDTO::fromArray([
    'name' => 'Cliente Exemplo',
    'cpfCnpj' => '12345678909',
    'email' => 'cliente@empresa.com',
]);
```

### ListCustomerRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Customer\ListCustomerRequestDTO;

$dto = ListCustomerRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
