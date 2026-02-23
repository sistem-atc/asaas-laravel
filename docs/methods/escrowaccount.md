# Metodos de EscrowAccount

Assinaturas implementadas em `src/Methods/EscrowAccount.php`.

## Indice

- [SaveOrUpdateEscrowAccount](#saveorupdateescrowaccount)
- [CreateDefaultEscrowAccount](#createdefaultescrowaccount)
- [FinishPaymentEscrow](#finishpaymentescrow)
- [retrieveEscrowAccount](#retrieveescrowaccount)
- [retrieveDefaultEscrowAccount](#retrievedefaultescrowaccount)
- [retrievePaymentEscrow](#retrievepaymentescrow)

## SaveOrUpdateEscrowAccount

```php
Asaas::escrowAccount()->SaveOrUpdateEscrowAccount(
    string $id,
    EscrowAccountRequestDTO $data
): EscrowAccountResponseDTO
```

## CreateDefaultEscrowAccount

```php
Asaas::escrowAccount()->CreateDefaultEscrowAccount(
    EscrowAccountRequestDTO $data
): EscrowAccountResponseDTO
```

## FinishPaymentEscrow

```php
Asaas::escrowAccount()->FinishPaymentEscrow(
    string $id
): FinishPaymentEscrowResponseDTO
```

## retrieveEscrowAccount

```php
Asaas::escrowAccount()->retrieveEscrowAccount(
    string $id
): EscrowAccountResponseDTO
```

## retrieveDefaultEscrowAccount

```php
Asaas::escrowAccount()->retrieveDefaultEscrowAccount(): EscrowAccountResponseDTO
```

## retrievePaymentEscrow

```php
Asaas::escrowAccount()->retrievePaymentEscrow(string $id): EscrowResponseDTO
```


## Como montar os DTOs

### EscrowAccountRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\EscrowAccount\EscrowAccountRequestDTO;

$dto = EscrowAccountRequestDTO::fromArray([
    // Campos da configuracao de escrow
]);
```
