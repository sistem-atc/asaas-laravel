<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveAsaasAccountNumberDTO implements DTOInterface
{

    use CastToArray;

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
}