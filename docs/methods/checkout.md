# Metodos de Checkout

Assinaturas implementadas em `src/Methods/Checkout.php`.

## Indice

- [createCheckout](#createcheckout)
- [cancelCheckout](#cancelcheckout)

## createCheckout

```php
Asaas::checkout()->createCheckout(
    CreateNewCheckoutRequestDTO $data
): CheckoutResponseDTO
```

## cancelCheckout

```php
Asaas::checkout()->cancelCheckout(string $id): CheckoutResponseDTO
```


## Como montar os DTOs

### CreateNewCheckoutRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Checkout\CreateNewCheckoutRequestDTO;

$dto = CreateNewCheckoutRequestDTO::fromArray([
    // Campos do checkout
]);
```
