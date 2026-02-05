<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class PaymentFees implements DTOInterface
{
    public function __construct(
        public readonly ?BankSlipFees $bankSlip,
        public readonly ?CreditCardFees $creditCard,
        public readonly ?DebitCardFees $debitCard,
        public readonly ?PixFees $pix,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            bankSlip: isset($data['bankSlip']) ? BankSlipFees::fromArray($data['bankSlip']) : null,
            creditCard: isset($data['creditCard']) ? CreditCardFees::fromArray($data['creditCard']) : null,
            debitCard: isset($data['debitCard']) ? DebitCardFees::fromArray($data['debitCard']) : null,
            pix: isset($data['pix']) ? PixFees::fromArray($data['pix']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'bankSlip'   => $this->bankSlip?->toArray(),
            'creditCard' => $this->creditCard?->toArray(),
            'debitCard'  => $this->debitCard?->toArray(),
            'pix'        => $this->pix?->toArray(),
        ], fn($v) => !is_null($v));
    }
}