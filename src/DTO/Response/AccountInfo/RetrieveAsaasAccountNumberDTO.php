<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;

class RetrieveAsaasAccountNumberDTO implements DTOInterface
{
    public function __construct(
        public readonly ?string $agency,
        public readonly ?string $account,
        public readonly ?string $accountDigit,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            agency: $data['agency'] ?? null,
            account: $data['account'] ?? null,
            accountDigit: $data['accountDigit'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'agency'       => $this->agency,
            'account'      => $this->account,
            'accountDigit' => $this->accountDigit,
        ], fn($v) => !is_null($v));
    }
}