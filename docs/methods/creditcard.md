# Metodos de CreditCard

Assinaturas implementadas em `src/Methods/CreditCard.php`.

## Indice

- [tokenization](#tokenization)

## tokenization

```php
Asaas::creditCard()->tokenization(
    CreditCardTokenizationRequestDTO $data
): CommonCreditCard
```


## Como montar os DTOs

### CreditCardTokenizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Chargeback\CreditCardTokenizationRequestDTO;

$dto = CreditCardTokenizationRequestDTO::fromArray([
    // Ex.: 'creditCardNumber' => '4111111111111111',
    // Ex.: 'creditCardHolderName' => 'Nome do Portador',
]);
```
