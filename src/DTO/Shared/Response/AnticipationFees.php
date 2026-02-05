<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class AnticipationFees implements DTOInterface
{
    public function __construct(
        public readonly ?AnticipationCreditCardFees $creditCard,
        public readonly ?AnticipationBankSlipFees $bankSlip,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCard: isset($data['creditCard']) ? ($data['creditCard'] instanceof AnticipationCreditCardFees ? $data['creditCard'] : AnticipationCreditCardFees::fromArray($data['creditCard'])) : null,
            bankSlip: isset($data['bankSlip']) ? ($data['bankSlip'] instanceof AnticipationBankSlipFees ? $data['bankSlip'] : AnticipationBankSlipFees::fromArray($data['bankSlip'])) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'creditCard' => $this->creditCard?->toArray(),
            'bankSlip'   => $this->bankSlip?->toArray(),
        ], fn($v) => !is_null($v));
    }
}