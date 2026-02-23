# Metodos de Transfer

Assinaturas implementadas em `src/Methods/Transfer.php`.

## Indice

- [transferAnotherInstitutionAccountOrPixKey](#transferanotherinstitutionaccountorpixkey)
- [listTransfers](#listtransfers)
- [transferAsaasAccount](#transferasaasaccount)
- [retrieveSingleTransfer](#retrievesingletransfer)
- [cancelTransfer](#canceltransfer)

## transferAnotherInstitutionAccountOrPixKey

```php
Asaas::transfer()->transferAnotherInstitutionAccountOrPixKey(
    TransferAnotherInstitutionRequestDTO $data
): TranferAnotherResponseDTO
```

## listTransfers

```php
Asaas::transfer()->listTransfers(
    ListTransferRequestDTO $queryParams
): ListTransferResponseDTO
```

## transferAsaasAccount

```php
Asaas::transfer()->transferAsaasAccount(
    TransferAsaasAccountRequestDTO $data
): TransferAsaasResponseDTO
```

## retrieveSingleTransfer

```php
Asaas::transfer()->retrieveSingleTransfer(string $id): TranferAnotherResponseDTO
```

## cancelTransfer

```php
Asaas::transfer()->cancelTransfer(string $id): TranferAnotherResponseDTO
```


## Como montar os DTOs

### TransferAnotherInstitutionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAnotherInstitutionRequestDTO;

$dto = TransferAnotherInstitutionRequestDTO::fromArray([
    // Campos de transferencia TED/Pix para outra instituicao
]);
```

### ListTransferRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Transfer\ListTransferRequestDTO;

$dto = ListTransferRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### TransferAsaasAccountRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAsaasAccountRequestDTO;

$dto = TransferAsaasAccountRequestDTO::fromArray([
    // Campos de transferencia entre contas Asaas
]);
```
