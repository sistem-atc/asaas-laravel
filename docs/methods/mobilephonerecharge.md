# Metodos de MobilePhoneRecharge

Assinaturas implementadas em `src/Methods/MobilePhoneRecharge.php`.

## Indice

- [requestRecharge](#requestrecharge)
- [listCellPhoneTopups](#listcellphonetopups)
- [recoverSingleCellPhoneRecharge](#recoversinglecellphonerecharge)
- [cancelCellPhoneRecharge](#cancelcellphonerecharge)
- [searchCellPhoneProvider](#searchcellphoneprovider)

## requestRecharge

```php
Asaas::mobilePhoneRecharge()->requestRecharge(
    RechargeRequestDTO $data
): RechargeResponseDTO
```

## listCellPhoneTopups

```php
Asaas::mobilePhoneRecharge()->listCellPhoneTopups(
    ListCellPhonesRequestDTO $data
): ListCellPhonesResponseDTO
```

## recoverSingleCellPhoneRecharge

```php
Asaas::mobilePhoneRecharge()->recoverSingleCellPhoneRecharge(
    string $id
): RechargeResponseDTO
```

## cancelCellPhoneRecharge

```php
Asaas::mobilePhoneRecharge()->cancelCellPhoneRecharge(
    string $id
): RechargeResponseDTO
```

## searchCellPhoneProvider

```php
Asaas::mobilePhoneRecharge()->searchCellPhoneProvider(
    string $phoneNumber
): SearchCellPhoneResponseDTO
```

## Como montar os DTOs

### RechargeRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\MobilePhoneRecharge\RechargeRequestDTO;
```

### ListCellPhonesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\MobilePhoneRecharge\ListCellPhonesRequestDTO;
```
