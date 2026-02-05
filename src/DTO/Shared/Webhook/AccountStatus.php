<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\General;
use SistemAtc\Asaas\Enum\Documentation;
use SistemAtc\Asaas\Enum\CommercialInfo;
use SistemAtc\Asaas\Enum\BankAccountInfo;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AccountStatus implements DTOInterface
{

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

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'commercialInfo' => $this->commercialInfo?->value,
            'bankAccountInfo' => $this->bankAccountInfo?->value,
            'documentation' => $this->documentation?->value,
            'general' => $this->general?->value,
        ], fn($value) => !is_null($value));
    }

}
