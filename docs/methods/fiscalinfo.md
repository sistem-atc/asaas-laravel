# Metodos de FiscalInfo

Assinaturas implementadas em `src/Methods/FiscalInfo.php`.

## Indice

- [listMunicipalConfigurations](#listmunicipalconfigurations)
- [createAndUpdateTaxInformation](#createandupdatetaxinformation)
- [retrieveTaxInformation](#retrievetaxinformation)
- [listMunicipalServices](#listmunicipalservices)
- [listNBSCodes](#listnbscodes)
- [configureInvoiceIssuingPortal](#configureinvoiceissuingportal)
- [listFederalServiceCodes](#listfederalservicecodes)
- [listOperationIndicatorCodes](#listoperationindicatorcodes)
- [listTaxClassificationCodes](#listtaxclassificationcodes)
- [listTaxSituationCodes](#listtaxsituationcodes)

## listMunicipalConfigurations

```php
Asaas::fiscalInfo()->listMunicipalConfigurations(): ListMunicipalConfigurationResponseDTO
```

## createAndUpdateTaxInformation

```php
Asaas::fiscalInfo()->createAndUpdateTaxInformation(
    FiscalInfoRequestDTO $multipartData
): TaxInformationResponseDTO
```

## retrieveTaxInformation

```php
Asaas::fiscalInfo()->retrieveTaxInformation(): TaxInformationResponseDTO
```

## listMunicipalServices

```php
Asaas::fiscalInfo()->listMunicipalServices(
    ListMunicipalServiceRequestDTO $queryParams
): ListMunicipalServicesResponseDTO
```

## listNBSCodes

```php
Asaas::fiscalInfo()->listNBSCodes(
    ListNbsCodesRequestDTO $queryParams
): ListNbsCodesResponseDTO
```

## configureInvoiceIssuingPortal

```php
Asaas::fiscalInfo()->configureInvoiceIssuingPortal(
    ConfgureInvoiceRequestDTO $data
): ConfigureInvoiceResponseDTO
```

## listFederalServiceCodes

```php
Asaas::fiscalInfo()->listFederalServiceCodes(
    ListCodesRequestDTO $queryParams
): ListCodesResponseDTO
```

## listOperationIndicatorCodes

```php
Asaas::fiscalInfo()->listOperationIndicatorCodes(
    ListCodesRequestDTO $queryParams
): ListCodesResponseDTO
```

## listTaxClassificationCodes

```php
Asaas::fiscalInfo()->listTaxClassificationCodes(
    ListTaxClassificationRequestDTO $queryParams
): ListTaxClassificationResponseDTO
```

## listTaxSituationCodes

```php
Asaas::fiscalInfo()->listTaxSituationCodes(
    ListCodesRequestDTO $queryParams
): ListTaxSituationResponseDTO
```


## Como montar os DTOs

### FiscalInfoRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\FiscalInfoRequestDTO;

$dto = FiscalInfoRequestDTO::fromArray([
    // Campos fiscais e arquivos (quando aplicavel)
]);
```

### ListMunicipalServiceRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListMunicipalServiceRequestDTO;

$dto = ListMunicipalServiceRequestDTO::fromArray([
    // Ex.: 'municipalityCode' => '3550308',
]);
```

### ListNbsCodesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListNbsCodesRequestDTO;

$dto = ListNbsCodesRequestDTO::fromArray([
    // Ex.: 'description' => 'servico',
]);
```

### ConfgureInvoiceRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ConfgureInvoiceRequestDTO;

$dto = ConfgureInvoiceRequestDTO::fromArray([
    // Campos de configuracao do portal
]);
```

### ListCodesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListCodesRequestDTO;

$dto = ListCodesRequestDTO::fromArray([
    // Ex.: 'description' => 'consultoria',
]);
```

### ListTaxClassificationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListTaxClassificationRequestDTO;

$dto = ListTaxClassificationRequestDTO::fromArray([
    // Ex.: 'description' => 'servico',
]);
```
