<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AsaasCustomer implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $name,
        public readonly ?string $cpfCnpj,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
        public readonly ?string $address,
        public readonly ?string $addressNumber,
        public readonly ?string $complement,
        public readonly ?string $province,
        public readonly ?string $postalCode,
        public readonly ?string $externalReference,
        public readonly ?bool $notificationDisable,
        public readonly ?string $additionalEmails,
        public readonly ?string $municipalInscription,
        public readonly ?string $stateInscription,
        public readonly ?string $observations,
        public readonly ?string $groupName,
        public readonly ?string $company,
        public readonly ?bool $foreignCustomer,
        public readonly ?string $asaas_id,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            cpfCnpj: isset($data['cpfCnpj']) ? preg_replace('/\D/', '', $data['cpfCnpj']) : null,
            email: $data['email'] ?? null,
            phone: isset($data['phone']) ? preg_replace('/\D/', '', $data['phone']) : null,
            mobilePhone: $data['mobile_phone'] ?? $data['mobilePhone'] ?? null,
            address: $data['address'] ?? null,
            addressNumber: $data['address_number'] ?? $data['addressNumber'] ?? null,
            complement: $data['complement'] ?? null,
            province: $data['province'] ?? null,
            postalCode: isset($data['postalCode']) ? preg_replace('/\D/', '', $data['postalCode']) : null,
            externalReference: (string) ($data['id'] ?? $data['externalReference'] ?? ''),
            notificationDisable: $data['notification_disable'] ?? $data['notificationDisable'] ?? false,
            additionalEmails: $data['additional_emails'] ?? $data['additionalEmails'] ?? null,
            municipalInscription: $data['municipal_inscription'] ?? $data['municipalInscription'] ?? null,
            stateInscription: $data['state_inscription'] ?? $data['stateInscription'] ?? null,
            observations: $data['observations'] ?? null,
            groupName: $data['group_name'] ?? $data['groupName'] ?? null,
            company: $data['company'] ?? null,
            foreignCustomer: $data['foreign_customer'] ?? $data['foreignCustomer'] ?? false,
            asaas_id: $data['asaas_id'] ?? $data['asaasId'] ?? null,
        );
    }
}
