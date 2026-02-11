<?php

namespace SistemAtc\Asaas\DTO\Response\Customer;

use SistemAtc\Asaas\Enum\TypePerson;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class CustomerCreateDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
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
}
