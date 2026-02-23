# Metodos de Antecipacao (Anticipation)

Assinaturas implementadas em `src/Methods/Anticipation.php`.

## Indice

- [retrieveSingleAnticipation](#retrievesingleanticipation)
- [requestAnticipation](#requestanticipation)
- [listAnticipations](#listanticipations)
- [simulateAnticipation](#simulateanticipation)
- [updateStatusAutomaticAnticipation](#updatestatusautomaticanticipation)
- [retrieveStatusAutomaticAnticipation](#retrievestatusautomaticanticipation)
- [retrieveAnticipationLimits](#retrieveanticipationlimits)
- [cancelAnticipation](#cancelanticipation)

## retrieveSingleAnticipation

```php
Asaas::anticipation()->retrieveSingleAnticipation(
    string $anticipationId
): RetrieveAnticipationResponseDTO
```

## requestAnticipation

```php
Asaas::anticipation()->requestAnticipation(
    RequestAnticipationRequestDTO $data
): RetrieveAnticipationResponseDTO
```

## listAnticipations

```php
Asaas::anticipation()->listAnticipations(
    ListAnticipationFilterRequestDTO $queryParams
): ListAnticipationResponseDTO
```

## simulateAnticipation

```php
Asaas::anticipation()->simulateAnticipation(
    SimulateAnticipationRequestDTO $data
): SimulateAnticipationResponseDTO
```

## updateStatusAutomaticAnticipation

```php
Asaas::anticipation()->updateStatusAutomaticAnticipation(
    UpdateAutomaticAnticipationRequestDTO $data
): AutomaticAnticipationConfigResponseDTO
```

## retrieveStatusAutomaticAnticipation

```php
Asaas::anticipation()->retrieveStatusAutomaticAnticipation(): AutomaticAnticipationConfigResponseDTO
```

## retrieveAnticipationLimits

```php
Asaas::anticipation()->retrieveAnticipationLimits(): RetrieveAnticipationLimitsResponseDTO
```

## cancelAnticipation

```php
Asaas::anticipation()->cancelAnticipation(
    string $anticipationId
): RetrieveAnticipationResponseDTO
```

## Referencia

- [Documentacao Oficial - Antecipacoes](https://docs.asaas.com/docs/antecipacao)

## Como montar os DTOs

### RequestAnticipationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationRequestDTO;

$dto = RequestAnticipationRequestDTO::fromArray([
    // Ex.: 'payment' => 'pay_xxx',
    // Ex.: 'installment' => 'ins_xxx',
]);
```

### ListAnticipationFilterRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterRequestDTO;

$dto = ListAnticipationFilterRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### SimulateAnticipationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationRequestDTO;

$dto = SimulateAnticipationRequestDTO::fromArray([
    // Ex.: 'payment' => 'pay_xxx',
]);
```

### UpdateAutomaticAnticipationRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationRequestDTO;

$dto = UpdateAutomaticAnticipationRequestDTO::fromArray([
    // Ex.: 'enabled' => true,
    // Ex.: 'type' => 'BALANCE',
]);
```
