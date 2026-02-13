<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Customer;

use SistemAtc\Asaas\DTO\Request\Customer\AsaasCustomer;
use SistemAtc\Asaas\Tests\TestCase;

class AsaasCustomerTest extends TestCase
{
    public function test_create_asaas_customer_from_array(): void
    {
        $data = [
            'name' => 'John Doe',
            'cpfCnpj' => '24971563792',
            'email' => 'john@example.com',
            'phone' => '4738010919',
            'mobilePhone' => '4799376637',
        ];

        $dto = AsaasCustomer::fromArray($data);

        expect($dto)->toBeInstanceOf(AsaasCustomer::class);
    }

    public function test_asaas_customer_to_array(): void
    {
        $data = [
            'name' => 'John Doe',
            'cpfCnpj' => '24971563792',
            'email' => 'john@example.com',
            'phone' => '4738010919',
            'mobilePhone' => '4799376637',
        ];

        $dto = AsaasCustomer::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_asaas_customer_validation(): void
    {
        $data = [
            'name' => 'John Doe',
            'cpfCnpj' => '24971563792',
            'email' => 'john@example.com',
            'phone' => '4738010919',
            'mobilePhone' => '4799376637',
        ];

        $dto = AsaasCustomer::fromArray($data);
        expect($dto)->toBeInstanceOf(AsaasCustomer::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}