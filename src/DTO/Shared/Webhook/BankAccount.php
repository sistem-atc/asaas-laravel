<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

class BankAccount
{
    public function __construct(
        public readonly ?Bank $bank,
        public readonly ?string $accountName,
        public readonly ?string $ownerName,
        public readonly ?string $cpfCnpj,
        public readonly ?string $agency,
        public readonly ?string $agencyDigit,
        public readonly ?string $account,
        public readonly ?string $accountDigit,
        public readonly ?string $pixAddressKey,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            bank: isset($data['bank']) ? Bank::fromArray($data['bank']) : null,
            accountName: $data['accountName'] ?? null,
            ownerName: $data['ownerName'] ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            agency: $data['agency'] ?? null,
            agencyDigit: $data['agencyDigit'] ?? null,
            account: $data['account'] ?? null,
            accountDigit: $data['accountDigit'] ?? null,
            pixAddressKey: $data['pixAddressKey'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'bank' => $this->bank?->toArray(),
            'accountName' => $this->accountName,
            'ownerName' => $this->ownerName,
            'cpfCnpj' => $this->cpfCnpj,
            'agency' => $this->agency,
            'agencyDigit' => $this->agencyDigit,
            'account' => $this->account,
            'accountDigit' => $this->accountDigit,
            'pixAddressKey' => $this->pixAddressKey,
        ], fn($value) => !is_null($value));
    }
}
