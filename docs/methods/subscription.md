# Metodos de Subscription (Assinaturas)

Assinaturas implementadas em `src/Methods/Subscription.php`.

## Indice

- [createNewSubscription](#createnewsubscription)
- [list](#list)
- [createSubscriptionWithCreditCard](#createsubscriptionwithcreditcard)
- [retrieveSingleSubscription](#retrievesinglesubscription)
- [update](#update)
- [remove](#remove)
- [updateCreditCard](#updatecreditcard)
- [listPaymentsSubscription](#listpaymentssubscription)
- [generateSubscriptionBooklet](#generatesubscriptionbooklet)
- [createConfigurationForIssuingInvoices](#createconfigurationforissuinginvoices)
- [retrieveConfigurationForIssuingInvoices](#retrieveconfigurationforissuinginvoices)
- [removeConfigurationForIssuingInvoices](#removeconfigurationforissuinginvoices)
- [updateConfigurationForIssuingInvoices](#updateconfigurationforissuinginvoices)
- [listInvoicesForSubscriptionCharges](#listinvoicesforsubscriptioncharges)

## createNewSubscription

```php
Asaas::subscription()->createNewSubscription(
    CreateSubscriptionRequestDTO $data
): SubscriptionResponseDTO
```

## list

```php
Asaas::subscription()->list(
    ListSubscriptionRequestDTO $data
): ListSubscriptionResponseDTO
```

## createSubscriptionWithCreditCard

```php
Asaas::subscription()->createSubscriptionWithCreditCard(
    CreateSubscriptionCreditCardRequestDTO $data
): SubscriptionCreditCardResponseDTO
```

## retrieveSingleSubscription

```php
Asaas::subscription()->retrieveSingleSubscription(
    string $id
): SubscriptionResponseDTO
```

## update

```php
Asaas::subscription()->update(
    string $id,
    UpdateSubscriptionRequestDTO $data
): SubscriptionResponseDTO
```

## remove

```php
Asaas::subscription()->remove(string $id): DeleteSubscriptionResponseDTO
```

## updateCreditCard

```php
Asaas::subscription()->updateCreditCard(
    string $id,
    UpdateSubscriptionCreditCardRequestDTO $data
): SubscriptionResponseDTO
```

## listPaymentsSubscription

```php
Asaas::subscription()->listPaymentsSubscription(
    string $id,
    ListPaymentSubscriptionRequestDTO $queryParams
): ListPaymentSubscriptionResponseDTO
```

## generateSubscriptionBooklet

```php
Asaas::subscription()->generateSubscriptionBooklet(
    string $id,
    BookletPaymentSubscriptionRequestDTO $queryParams
): FileResponseDTO
```

## createConfigurationForIssuingInvoices

```php
Asaas::subscription()->createConfigurationForIssuingInvoices(
    string $id,
    ConfigurationInvoicesRequestDTO $data
): ConfigurationInvoicesResponseDTO
```

## retrieveConfigurationForIssuingInvoices

```php
Asaas::subscription()->retrieveConfigurationForIssuingInvoices(
    string $id
): ConfigurationInvoicesResponseDTO
```

## removeConfigurationForIssuingInvoices

```php
Asaas::subscription()->removeConfigurationForIssuingInvoices(
    string $id
): DeleteConfigurationResponseDTO
```

## updateConfigurationForIssuingInvoices

```php
Asaas::subscription()->updateConfigurationForIssuingInvoices(
    string $id,
    UpdateConfigurationInvoicesRequestDTO $data
): ConfigurationInvoicesResponseDTO
```

## listInvoicesForSubscriptionCharges

```php
Asaas::subscription()->listInvoicesForSubscriptionCharges(
    string $id,
    $queryParams
): ListInvoicesForSubscriptionResponseDTO
```

## Referencia

- [Documentacao Oficial - Assinaturas](https://docs.asaas.com/docs/assinaturas)

## Como montar os DTOs

### CreateSubscriptionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\CreateSubscriptionRequestDTO;

$dto = CreateSubscriptionRequestDTO::fromArray([
    'customer' => 'cus_xxx',
    'billingType' => 'BOLETO',
    'value' => 99.90,
    'nextDueDate' => '2026-03-01',
]);
```

### ListSubscriptionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\ListSubscriptionRequestDTO;

$dto = ListSubscriptionRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### CreateSubscriptionCreditCardRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\CreateSubscriptionCreditCardRequestDTO;

$dto = CreateSubscriptionCreditCardRequestDTO::fromArray([
    // Campos da assinatura com cartao
]);
```

### UpdateSubscriptionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateSubscriptionRequestDTO;

$dto = UpdateSubscriptionRequestDTO::fromArray([
    // Campos permitidos para atualizacao
]);
```

### UpdateSubscriptionCreditCardRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateSubscriptionCreditCardRequestDTO;

$dto = UpdateSubscriptionCreditCardRequestDTO::fromArray([
    // Campos do novo cartao
]);
```

### ListPaymentSubscriptionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\ListPaymentSubscriptionRequestDTO;

$dto = ListPaymentSubscriptionRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### BookletPaymentSubscriptionRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\BookletPaymentSubscriptionRequestDTO;

$dto = BookletPaymentSubscriptionRequestDTO::fromArray([
    // Ex.: filtros para gerar carnê da assinatura
]);
```

### ConfigurationInvoicesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\ConfigurationInvoicesRequestDTO;

$dto = ConfigurationInvoicesRequestDTO::fromArray([
    // Campos de configuracao de emissao de nota
]);
```

### UpdateConfigurationInvoicesRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateConfigurationInvoicesRequestDTO;

$dto = UpdateConfigurationInvoicesRequestDTO::fromArray([
    // Campos para atualizar configuracao de notas
]);
```
