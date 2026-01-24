<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use Illuminate\Support\Carbon;
use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\Enum\InvoiceStatus;
use SistemAtc\Asaas\Enum\StatusPayment;

class ListPayment
{
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?string $customer,
        public readonly ?string $customerGroupName,
        public readonly ?BillingType $billingType,
        public readonly ?StatusPayment $status,
        public readonly ?string $subscription,
        public readonly ?string $installment,
        public readonly ?string $externalReference,
        public readonly ?string $paymentDate,
        public readonly ?InvoiceStatus $invoiceStatus,
        public readonly ?string $estimatedCreditDate,
        public readonly ?string $pixQrCodeId,
        public readonly ?bool $anticipated,
        public readonly ?bool $anticipable,
        public readonly ?string $dateCreatedge,
        public readonly ?string $dateCreatedle,
        public readonly ?string $paymentDatege,
        public readonly ?string $paymentDatele,
        public readonly ?string $estimatedCreditDatege,
        public readonly ?string $estimatedCreditDatele,
        public readonly ?string $dueDatege,
        public readonly ?string $dueDatele,
        public readonly ?string $user,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            offset: (int) ($data['offset'] ?? 0),
            limit: (int) ($data['limit'] ?? 100),
            customer: $data['customer'] ?? null,
            customerGroupName: $data['customerGroupName'] ?? null,
            billingType: isset($data['billingType']) ? (is_string($data['billingType']) ? BillingType::from($data['billingType']) : $data['billingType']) : null,
            status: isset($data['status']) ? (is_string($data['status']) ? StatusPayment::from($data['status']) : $data['status']) : null,
            subscription: $data['subscription'] ?? null,
            installment: $data['installment'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            paymentDate: isset($data['paymentDate']) ? Carbon::parse($data['paymentDate'])->format('Y-m-d') : null,
            invoiceStatus: isset($data['invoiceStatus']) ? (is_string($data['invoiceStatus']) ? InvoiceStatus::from($data['invoiceStatus']) : $data['invoiceStatus']) : null,
            estimatedCreditDate: $data['estimatedCreditDate'] ?? null,
            pixQrCodeId: $data['pixQrCodeId'] ?? null,
            anticipated: isset($data['anticipated']) ? (bool) $data['anticipated'] : null,
            anticipable: isset($data['anticipable']) ? (bool) $data['anticipable'] : null,
            dateCreatedge: $data['dateCreated[ge]'] ?? $data['dateCreatedge'] ?? null,
            dateCreatedle: $data['dateCreated[le]'] ?? $data['dateCreatedle'] ?? null,
            paymentDatege: $data['paymentDate[ge]'] ?? $data['paymentDatege'] ?? null,
            paymentDatele: $data['paymentDate[le]'] ?? $data['paymentDatele'] ?? null,
            estimatedCreditDatege: $data['estimatedCreditDate[ge]'] ?? $data['estimatedCreditDatege'] ?? null,
            estimatedCreditDatele: $data['estimatedCreditDate[le]'] ?? $data['estimatedCreditDatele'] ?? null,
            dueDatege: $data['dueDate[ge]'] ?? $data['dueDatege'] ?? null,
            dueDatele: $data['dueDate[le]'] ?? $data['dueDatele'] ?? null,
            user: $data['user'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'offset' => $this->offset,
            'limit' => $this->limit,
            'customer' => $this->customer,
            'customerGroupName' => $this->customerGroupName,
            'billingType' => $this->billingType?->value,
            'status' => $this->status?->value,
            'subscription' => $this->subscription,
            'installment' => $this->installment,
            'externalReference' => $this->externalReference,
            'paymentDate' => $this->paymentDate,
            'invoiceStatus' => $this->invoiceStatus?->value,
            'estimatedCreditDate' => $this->estimatedCreditDate,
            'pixQrCodeId' => $this->pixQrCodeId,
            'anticipated' => $this->anticipated,
            'anticipable' => $this->anticipable,
            'dateCreated[ge]' => $this->dateCreatedge,
            'dateCreated[le]' => $this->dateCreatedle,
            'paymentDate[ge]' => $this->paymentDatege,
            'paymentDate[le]' => $this->paymentDatele,
            'estimatedCreditDate[ge]' => $this->estimatedCreditDatege,
            'estimatedCreditDate[le]' => $this->estimatedCreditDatele,
            'dueDate[ge]' => $this->dueDatege,
            'dueDate[le]' => $this->dueDatele,
            'user' => $this->user,
        ], fn($value) => !is_null($value));
    }

}
