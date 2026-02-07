# 🏦 Métodos de Informações da Conta

Documentação completa dos métodos disponíveis para gerenciamento de informações da conta Asaas.

## 📋 Índice

- [Buscar Dados Comerciais](#buscar-dados-comerciais)
- [Atualizar Dados Comerciais](#atualizar-dados-comerciais)
- [Personalizar Checkout](#personalizar-checkout)
- [Buscar Personalização](#buscar-personalização)
- [Número da Conta Asaas](#número-da-conta-asaas)
- [Taxas da Conta](#taxas-da-conta)
- [Status da Conta](#status-da-conta)
- [Wallet ID](#wallet-id)
- [Remover Subconta White Label](#remover-subconta-white-label)

## Buscar Dados Comerciais

Retorna os dados comerciais da conta.

### Método

```php
Asaas::accountinfo()->retrieveBusinessData(): RetrieveBusinessDataDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$dados = Asaas::accountinfo()->retrieveBusinessData();

echo "Nome: " . $dados->companyName;
echo "CPF/CNPJ: " . $dados->cpfCnpj;
echo "Email: " . $dados->email;
```

## Atualizar Dados Comerciais

Atualiza os dados comerciais da conta.

### Método

```php
Asaas::accountinfo()->updateBusinessData(UpdateBusinessDataDTO $data): RetrieveBusinessDataDTO
```

### Parâmetros

O método recebe um objeto `UpdateBusinessDataDTO`:

```php
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataDTO;
use SistemAtc\Asaas\Enum\TypePerson;

$data = UpdateBusinessDataDTO::fromArray([
    'personType' => TypePerson::FISICA,
    'cpfCnpj' => '12345678900',
    'email' => 'contato@example.com',
    'phone' => '11999999999',
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataDTO;
use SistemAtc\Asaas\Enum\TypePerson;

$data = UpdateBusinessDataDTO::fromArray([
    'personType' => TypePerson::FISICA,
    'cpfCnpj' => '12345678900',
    'email' => 'novoemail@example.com',
    'phone' => '11988888888',
    'address' => 'Rua Nova',
    'addressNumber' => '456',
    'postalCode' => '01234567',
]);

$dadosAtualizados = Asaas::accountinfo()->updateBusinessData($data);
```

## Personalizar Checkout

Salva a personalização do checkout de pagamento.

### Método

```php
Asaas::accountinfo()->savePaymentCheckoutCustomization(UpdateCheckoutCustomizationDTO $data): CheckoutCustomizationDTO
```

### Parâmetros

O método recebe um objeto `UpdateCheckoutCustomizationDTO` que pode incluir arquivos (multipart):

```php
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationDTO;

$data = UpdateCheckoutCustomizationDTO::fromArray([
    'logoBackgroundColor' => '#FFFFFF',
    'mainColor' => '#0066CC',
    'logoFile' => storage_path('app/logo.png'), // Caminho do arquivo
]);
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationDTO;

$data = UpdateCheckoutCustomizationDTO::fromArray([
    'logoBackgroundColor' => '#FFFFFF',
    'mainColor' => '#0066CC',
    'logoFile' => storage_path('app/logo.png'),
]);

$customizacao = Asaas::accountinfo()->savePaymentCheckoutCustomization($data);
```

## Buscar Personalização

Retorna as configurações de personalização do checkout.

### Método

```php
Asaas::accountinfo()->retrievePersonalizationSettings(): CheckoutCustomizationDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$settings = Asaas::accountinfo()->retrievePersonalizationSettings();

echo "Cor principal: " . $settings->mainColor;
echo "Cor de fundo do logo: " . $settings->logoBackgroundColor;
```

## Número da Conta Asaas

Retorna o número da conta Asaas.

### Método

```php
Asaas::accountinfo()->retrieveAsaasAccountNumber(): RetrieveAsaasAccountNumberDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$numeroConta = Asaas::accountinfo()->retrieveAsaasAccountNumber();

echo "Número da conta: " . $numeroConta->accountNumber;
```

## Taxas da Conta

Retorna as taxas configuradas da conta.

### Método

```php
Asaas::accountinfo()->retrieveAccountFees(): RetrieveAccountFeesDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$taxas = Asaas::accountinfo()->retrieveAccountFees();

echo "Taxa de boleto: " . $taxas->bankSlipFee . "%";
echo "Taxa de cartão: " . $taxas->creditCardFee . "%";
```

## Status da Conta

Verifica o status da conta.

### Método

```php
Asaas::accountinfo()->checkAccountStatus(): CheckAccountStatusDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$status = Asaas::accountinfo()->checkAccountStatus();

echo "Status: " . $status->status;
echo "Aprovado: " . ($status->approved ? 'Sim' : 'Não');
```

## Wallet ID

Retorna o Wallet ID da conta.

### Método

```php
Asaas::accountinfo()->retrieveWalletId(): RetrieveWalletIdDTO
```

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$wallet = Asaas::accountinfo()->retrieveWalletId();

echo "Wallet ID: " . $wallet->walletId;
```

## Remover Subconta White Label

Remove uma subconta white label.

### Método

```php
Asaas::accountinfo()->deleteWhiteLabelSubaccount(string $removeReason): DeleteWhiteLabelSubaccountDTO
```

### Parâmetros

- `$removeReason`: Motivo da remoção

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$resultado = Asaas::accountinfo()->deleteWhiteLabelSubaccount('Fechamento da operação');
```

## 📚 Referências

- [Documentação Oficial - Conta](https://docs.asaas.com/docs/conta)
