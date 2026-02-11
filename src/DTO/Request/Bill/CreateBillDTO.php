<?php

namespace SistemAtc\Asaas\DTO\Request\Bill;

use DateTime;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class CreateBillDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly string $identificationField,
        public readonly ?DateTime $scheduleDate = null,
        public readonly ?float $value = null,
        public readonly ?string $description = null,
        public readonly ?float $discount = null,
        public readonly ?float $interest = null,
        public readonly ?float $fine = null,
        public readonly ?DateTime $dueDate = null,
        public readonly ?string $externalReference = null,
    ) {}
}