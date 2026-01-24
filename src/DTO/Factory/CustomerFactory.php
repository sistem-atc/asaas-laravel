<?php

namespace SistemAtc\Asaas\DTO\Factory;

use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;

class CustomerFactory
{
    public static function makeCreateResponse(array $data): CustomerCreateDTO
    {
        return CustomerCreateDTO::fromArray($data);
    }
}
