<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use Illuminate\Support\Carbon;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;
use SistemAtc\Asaas\Traits\CastToArray;

class PaymentDTO implements DTOInterface
{
    use CastToArray;
    
    public function __construct(
        public readonly AsaasCustomer $customer,
        public readonly BillingType $billingType,
        public readonly ?float $value,
        public readonly string $dueDate,
        public readonly ?string $description,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation,
        public readonly ?string $externalReference,
        public readonly ?int $installmentCount,
        public readonly ?float $totalValue,
        public readonly ?float $installmentValue,
        public readonly ?Discount $discount,
        public readonly ?Interest $interest,
        public readonly ?Fine $fine,
        public readonly ?bool $postalService,
        public readonly ?Split $split,
        public readonly ?Callback $callback,
        public readonly ?CreditCard $creditCard,
        public readonly ?CreditCardHolderInfo $creditCardHolderInfo,
        public readonly ?string $creditCardToken,
        public readonly bool $authorizeOnly,
        public readonly ?string $remoteIp,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            customer: $data['customer'] instanceof AsaasCustomer ? $data['customer'] : AsaasCustomer::fromArray($data['customer']),
            billingType: $data['billing_type'] instanceof BillingType ? $data['billing_type'] : BillingType::from($data['billing_type']),
            value: $data['value'] ?? null,
            dueDate: Carbon::parse($data['dueDate'])->format('Y-m-d'),
            description: $data['description'] ?? null,
            daysAfterDueDateToRegistrationCancellation: $data['daysAfterDueDateToRegistrationCancellation'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            installmentCount: $data['installmentCount'] ?? null,
            totalValue: $data['totalValue'] ?? null,
            installmentValue: $data['installmentValue'] ?? null,
            discount: isset($data['discount']) ? Discount::fromArray($data['discount']) : null,
            interest: isset($data['interest']) ? Interest::fromArray($data['interest']) : null,
            fine: isset($data['fine']) ? Fine::fromArray($data['fine']) : null,
            postalService: $data['postalService'] ?? false,
            split: isset($data['split']) ? Split::fromArray($data['split']) : null,
            callback: isset($data['callback']) ? Callback::fromArray($data['callback']) : null,
            creditCard: isset($data['creditCard']) ? CreditCard::fromArray($data['creditCard']) : null,
            creditCardHolderInfo: isset($data['creditCardHolderInfo']) ? CreditCardHolderInfo::fromArray($data['creditCardHolderInfo']) : null,
            creditCardToken: $data['creditCardToken'] ?? null,
            authorizeOnly: $data['authorizeOnly'] ?? false,
            remoteIp: $data['remoteIp'] ?? null,
        );
    }
}
