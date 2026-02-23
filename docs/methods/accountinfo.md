# Metodos de Informacoes da Conta (AccountInfo)

Assinaturas implementadas em `src/Methods/AccountInfo.php`.

## Indice

- [retrieveBusinessData](#retrievebusinessdata)
- [updateBusinessData](#updatebusinessdata)
- [savePaymentCheckoutCustomization](#savepaymentcheckoutcustomization)
- [retrievePersonalizationSettings](#retrievepersonalizationsettings)
- [retrieveAsaasAccountNumber](#retrieveasaasaccountnumber)
- [retrieveAccountFees](#retrieveaccountfees)
- [checkAccountStatus](#checkaccountstatus)
- [retrieveWalletId](#retrievewalletid)
- [deleteWhiteLabelSubaccount](#deletewhitelabelsubaccount)

## retrieveBusinessData

```php
Asaas::accountInfo()->retrieveBusinessData(): RetrieveBusinessDataResponseDTO
```

## updateBusinessData

```php
Asaas::accountInfo()->updateBusinessData(
    UpdateBusinessDataRequestDTO $data
): RetrieveBusinessDataResponseDTO
```

## savePaymentCheckoutCustomization

```php
Asaas::accountInfo()->savePaymentCheckoutCustomization(
    UpdateCheckoutCustomizationRequestDTO $data
): AccountStatus
```

## retrievePersonalizationSettings

```php
Asaas::accountInfo()->retrievePersonalizationSettings(): AccountStatus
```

## retrieveAsaasAccountNumber

```php
Asaas::accountInfo()->retrieveAsaasAccountNumber(): RetrieveAsaasAccountNumberResponseDTO
```

## retrieveAccountFees

```php
Asaas::accountInfo()->retrieveAccountFees(): RetrieveAccountFeesResponseDTO
```

## checkAccountStatus

```php
Asaas::accountInfo()->checkAccountStatus(): AccountStatus
```

## retrieveWalletId

```php
Asaas::accountInfo()->retrieveWalletId(): RetrieveWalletIdResponseDTO
```

## deleteWhiteLabelSubaccount

```php
Asaas::accountInfo()->deleteWhiteLabelSubaccount(
    string $removeReason
): DeleteWhiteLabelSubaccountResponseDTO
```

## Referencia

- [Documentacao Oficial - Conta](https://docs.asaas.com/docs/conta)

## Como montar os DTOs

### UpdateBusinessDataRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataRequestDTO;

$dto = UpdateBusinessDataRequestDTO::fromArray([
    // Ex.: 'email' => 'financeiro@empresa.com',
    // Ex.: 'phone' => '11999999999',
]);
```

### UpdateCheckoutCustomizationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationRequestDTO;

$dto = UpdateCheckoutCustomizationRequestDTO::fromArray([
    // Ex.: 'mainColor' => '#0052CC',
    // Ex.: 'logoFile' => storage_path('app/logo.png'),
]);
```
