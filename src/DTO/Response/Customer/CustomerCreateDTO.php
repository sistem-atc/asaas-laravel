<?php

namespace SistemAtc\Asaas\DTO\Response\Customer;

use SistemAtc\Asaas\Enum\TypePerson;

class CustomerCreateDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $dateCreated,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
        public readonly ?string $address,
        public readonly ?string $addressNumber,
        public readonly ?string $complement,
        public readonly ?string $province,
        public readonly ?string $city,
        public readonly ?string $cityName,
        public readonly ?string $country,
        public readonly ?string $postalCode,
        public readonly ?string $cpfCnpj,
        public readonly ?TypePerson $personType,
        public readonly ?string $deleted,
        public readonly ?string $additionalEmails,
        public readonly ?string $externalReference,
        public readonly ?string $notificationDisabled,
        public readonly ?string $observations,
        public readonly ?string $foreignCustomer,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            dateCreated: $data['dateCreated'] ?? null,
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            mobilePhone: $data['mobilePhone'] ?? null,
            address: $data['address'] ?? null,
            addressNumber: $data['addressNumber'] ?? null,
            complement: $data['complement'] ?? null,
            province: $data['province'] ?? null,
            city: $data['city'] ?? null,
            cityName: $data['cityName'] ?? null,
            country: $data['country'] ?? null,
            postalCode: $data['postalCode'] ?? null,
            cpfCnpj: $data['cpfCnpj'] ?? null,
            personType: isset($data['personType']) ? TypePerson::tryFrom($data['personType']) : null,
            deleted: $data['deleted'] ?? null,
            additionalEmails: $data['additionalEmails'] ?? null,
            externalReference: $data['externalReference'] ?? null,
            notificationDisabled: $data['notificationDisabled'] ?? null,
            observations: $data['observations'] ?? null,
            foreignCustomer: $data['foreignCustomer'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'dateCreated' => $this->dateCreated,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'mobilePhone' => $this->mobilePhone,
            'address' => $this->address,
            'addressNumber' => $this->addressNumber,
            'complement' => $this->complement,
            'province' => $this->province,
            'city' => $this->city,
            'cityName' => $this->cityName,
            'country' => $this->country,
            'postalCode' => $this->postalCode,
            'cpfCnpj' => $this->cpfCnpj,
            'personType' => $this->personType?->value,
            'deleted' => $this->deleted,
            'additionalEmails' => $this->additionalEmails,
            'externalReference' => $this->externalReference,
            'notificationDisabled' => $this->notificationDisabled,
            'observations' => $this->observations,
            'foreignCustomer' => $this->foreignCustomer,
        ], fn($value) => !is_null($value));
    }
}
