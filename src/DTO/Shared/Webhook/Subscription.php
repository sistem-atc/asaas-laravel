<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\DTO\Shared\Webhook\Fine;
use SistemAtc\Asaas\DTO\Shared\Webhook\Split;
use SistemAtc\Asaas\DTO\Shared\Webhook\Discount;
use SistemAtc\Asaas\DTO\Shared\Webhook\Interest;

class Subscription
{
    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $customer,
        public readonly ?string $paymentLink,
        public readonly ?float $value,
        public readonly ?string $nextDueDate,
        public readonly ?string $cycle,
        public readonly ?string $description,
        public readonly ?string $billingType,
        public readonly bool $deleted,
        public readonly ?string $status,
        public readonly ?string $externalReference,
        public readonly bool $sendPaymentByPostalService,
        public readonly ?Discount $discount,
        public readonly ?Fine $fine,
        public readonly ?Interest $interest,
        public readonly ?array $split,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: $data['id'] ?? null,
            dateCreated: $data['dateCreated'] ?? null,
            customer: $data['customer'] ?? null,
            paymentLink: $data['paymentLink'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            nextDueDate: $data['nextDueDate'] ?? null,
            cycle: $data['cycle'] ?? null,
            description: $data['description'] ?? null,
            billingType: $data['billingType'] ?? null,
            deleted: (bool) ($data['deleted'] ?? false),
            status: $data['status'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            sendPaymentByPostalService: (bool) ($data['sendPaymentByPostalService'] ?? false),
            discount: isset($data['discount']) ? Discount::fromArray($data['discount']) : null,
            fine: isset($data['fine']) ? Fine::fromArray($data['fine']) : null,
            interest: isset($data['interest']) ? Interest::fromArray($data['interest']) : null,
            split: isset($data['split']) ? array_map(fn($s) => Split::fromArray($s), $data['split']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'object' => $this->object,
            'id' => $this->id,
            'dateCreated' => $this->dateCreated,
            'customer' => $this->customer,
            'paymentLink' => $this->paymentLink,
            'value' => $this->value,
            'nextDueDate' => $this->nextDueDate,
            'cycle' => $this->cycle,
            'description' => $this->description,
            'billingType' => $this->billingType,
            'deleted' => $this->deleted,
            'status' => $this->status,
            'externalReference' => $this->externalReference,
            'sendPaymentByPostalService' => $this->sendPaymentByPostalService,
            'discount' => $this->discount?->toArray(),
            'fine' => $this->fine?->toArray(),
            'interest' => $this->interest?->toArray(),
            'split' => $this->split ? array_map(fn($s) => $s->toArray(), $this->split) : null,
        ], fn($value) => !is_null($value));
    }
}
