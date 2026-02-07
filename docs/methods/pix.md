# 💳 Métodos de PIX

Documentação completa dos métodos disponíveis para PIX.

## 📋 Índice

- [Criar QR Code Estático](#criar-qr-code-estático)

## Criar QR Code Estático

Cria um QR Code PIX estático para recebimento.

### Método

```php
Asaas::pix()->createQrCodeStatic(array $data): ?array
```

### Parâmetros

O método recebe um array com os dados do QR Code:

```php
$data = [
    'addressKey' => 'sua-chave-pix@example.com',
    'description' => 'Pagamento de serviço',
    'value' => 100.00,
];
```

### Campos Disponíveis

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `addressKey` | string | Sim | Chave PIX (email, CPF, CNPJ, telefone ou chave aleatória) |
| `description` | string | Não | Descrição do pagamento |
| `value` | float | Não | Valor do pagamento |
| `expirationDate` | string | Não | Data de expiração (Y-m-d) |

### Exemplo

```php
use SistemAtc\Asaas\Facades\Asaas;

$data = [
    'addressKey' => 'sua-chave-pix@example.com',
    'description' => 'Pagamento de serviço',
    'value' => 100.00,
];

$qrCode = Asaas::pix()->createQrCodeStatic($data);

if ($qrCode) {
    echo "QR Code: " . $qrCode['encodedImage'];
    echo "Código Copia e Cola: " . $qrCode['payload'];
}
```

### Exemplo com Valor Dinâmico

```php
use SistemAtc\Asaas\Facades\Asaas;

$data = [
    'addressKey' => '11999999999', // Telefone
    'description' => 'Pagamento de pedido #123',
    'value' => 250.50,
    'expirationDate' => '2024-12-31',
];

$qrCode = Asaas::pix()->createQrCodeStatic($data);
```

## 📚 Referências

- [Documentação Oficial - PIX](https://docs.asaas.com/docs/pix)
