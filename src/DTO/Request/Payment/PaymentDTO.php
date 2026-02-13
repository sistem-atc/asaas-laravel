<?php

namespace SistemAtc\Asaas\DTO\Request\Payment;

use DateTime;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Split;
use SistemAtc\Asaas\DTO\Shared\Request\Callback;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCard;
use SistemAtc\Asaas\DTO\Shared\Request\CreditCardHolderInfo;

class PaymentDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly CustomerCreateDTO $customer,
        public readonly BillingType $billingType,
        public readonly ?float $value,
        public readonly DateTime $dueDate,
        public readonly ?string $description = null,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation = null,
        public readonly ?string $externalReference = null,
        public readonly ?int $installmentCount = null,
        public readonly ?float $totalValue = null,
        public readonly ?float $installmentValue = null,
        public readonly ?Discount $discount = null,
        public readonly ?Interest $interest = null,
        public readonly ?Fine $fine = null,
        public readonly ?bool $postalService = null,
        public readonly ?Split $split = null,
        public readonly ?Callback $callback = null,
        public readonly ?CreditCard $creditCard = null,
        public readonly ?CreditCardHolderInfo $creditCardHolderInfo = null,
        public readonly ?string $creditCardToken = null,
        public readonly bool $authorizeOnly = false,
        public readonly ?string $remoteIp = null,
    ) {}
}
