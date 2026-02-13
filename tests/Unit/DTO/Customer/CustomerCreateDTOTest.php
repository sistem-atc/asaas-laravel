<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Customer;

use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;
use SistemAtc\Asaas\Tests\TestCase;

class CustomerCreateDTOTest extends TestCase
{
    public function test_create_customer_create_dto_from_array(): void
    {
        $data = [
            'id' => 'cus_123456',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'cpfCnpj' => '24971563792',
        ];

        $dto = CustomerCreateDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CustomerCreateDTO::class);
    }

    public function test_customer_create_dto_to_array(): void
    {
        $data = [
            'id' => 'cus_123456',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'cpfCnpj' => '24971563792',
        ];

        $dto = CustomerCreateDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_customer_create_dto_with_fixture(): void
    {
        $data = $this->getFixture("Customer/create_customer_response");

        $dto = CustomerCreateDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CustomerCreateDTO::class);
    }    
    public function test_customer_create_dto_validation(): void
    {
        $data = [
            'id' => 'cus_123456',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'cpfCnpj' => '24971563792',
        ];

        $dto = CustomerCreateDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(CustomerCreateDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}