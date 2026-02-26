<?php

namespace SistemAtc\Asaas\DTO\Request\Customer;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListCustomerRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $groupName = null,
        public readonly ?string $externalReference = null,
    ) {}
}