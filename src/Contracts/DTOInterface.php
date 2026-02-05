<?php

namespace SistemAtc\Asaas\Contracts;

interface DTOInterface
{
    public static function fromArray(array $data): self;
    public function toArray(): array;
}