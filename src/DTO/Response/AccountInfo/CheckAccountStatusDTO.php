<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\CommercialInfo;
use SistemAtc\Asaas\Enum\BankAccountInfo;
use SistemAtc\Asaas\Enum\Documentation;
use SistemAtc\Asaas\Enum\General;
use SistemAtc\Asaas\Traits\CastToArray;

class CheckAccountStatusDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $id,
        public readonly ?CommercialInfo $commercialInfo,
        public readonly ?BankAccountInfo $bankAccountInfo,
        public readonly ?Documentation $documentation,
        public readonly ?General $general,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            commercialInfo: isset($data['commercialInfo']) ? CommercialInfo::tryFrom($data['commercialInfo']) : null,
            bankAccountInfo: isset($data['bankAccountInfo']) ? BankAccountInfo::tryFrom($data['bankAccountInfo']) : null,
            documentation: isset($data['documentation']) ? Documentation::tryFrom($data['documentation']) : null,
            general: isset($data['general']) ? General::tryFrom($data['general']) : null,
        );
    }
}