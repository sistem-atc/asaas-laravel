# Metodos de CreditBureauReport

Assinaturas implementadas em `src/Methods/CreditBureauReport.php`.

## Indice

- [makeConsultation](#makeconsultation)
- [listCreditBureauReports](#listcreditbureaureports)
- [retrieveCreditBureauReport](#retrievecreditbureaureport)

## makeConsultation

```php
Asaas::creditBureauReport()->makeConsultation(
    MakeConsultationRequestDTO $data
): MakeConsultationResponseDTO
```

## listCreditBureauReports

```php
Asaas::creditBureauReport()->listCreditBureauReports(
    ListCreditBureauReportsRequestDTO $queryParams
): ListCreditBureauReportsResponseDTO
```

## retrieveCreditBureauReport

```php
Asaas::creditBureauReport()->retrieveCreditBureauReport(
    string $id
): MakeConsultationResponseDTO
```


## Como montar os DTOs

### MakeConsultationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\MakeConsultationRequestDTO;

$dto = MakeConsultationRequestDTO::fromArray([
    // Campos da consulta
]);
```

### ListCreditBureauReportsRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\ListCreditBureauReportsRequestDTO;

$dto = ListCreditBureauReportsRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```
