# Metodos de Pix

Assinaturas implementadas em `src/Methods/Pix.php`.

## Indice

- [createKey](#createkey)
- [listKeys](#listkeys)
- [retrieveSingleKey](#retrievesinglekey)
- [removeKey](#removekey)
- [createQrCodeStatic](#createqrcodestatic)
- [removeStaticQRCode](#removestaticqrcode)
- [availableTokenBucketCheck](#availabletokenbucketcheck)

## createKey

```php
Asaas::pix()->createKey(CreatePixAddressKeyRequestDTO $data): PixAddressKeyResponseDTO
```

## listKeys

```php
Asaas::pix()->listKeys(ListKeysRequestDTO $queryParams): ListKeysResponseDTO
```

## retrieveSingleKey

```php
Asaas::pix()->retrieveSingleKey(string $id): PixAddressKeyResponseDTO
```

## removeKey

```php
Asaas::pix()->removeKey(string $id): PixAddressKeyResponseDTO
```

## createQrCodeStatic

```php
Asaas::pix()->createQrCodeStatic(
    CreateQRCodeStaticRequestDTO $data
): QRCodeStaticResponseDTO
```

## removeStaticQRCode

```php
Asaas::pix()->removeStaticQRCode(string $id): DeleteQrCodeStaticResponseDTO
```

## availableTokenBucketCheck

```php
Asaas::pix()->availableTokenBucketCheck(): AvailableTokenBucketCheckResponseDTO
```

## Referencia

- [Documentacao Oficial - Pix](https://docs.asaas.com/docs/pix)

## Como montar os DTOs

### CreatePixAddressKeyRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Pix\CreatePixAddressKeyRequestDTO;

$dto = CreatePixAddressKeyRequestDTO::fromArray([
    // Ex.: 'type' => 'EMAIL',
    // Ex.: 'value' => 'financeiro@empresa.com',
]);
```

### ListKeysRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Pix\ListKeysRequestDTO;

$dto = ListKeysRequestDTO::fromArray([
    'offset' => 0,
    'limit' => 50,
]);
```

### CreateQRCodeStaticRequestDTO

```php
use SistemAtc\Asaas\DTO\Request\Pix\CreateQRCodeStaticRequestDTO;

$dto = CreateQRCodeStaticRequestDTO::fromArray([
    'addressKey' => 'financeiro@empresa.com',
    'value' => 100.00,
    'description' => 'Pagamento',
]);
```
