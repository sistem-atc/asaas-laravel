<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Response\Payment\PaymentResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class PaymentDTOTest extends TestCase
{
    public function test_create_payment_dto_from_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_request');

        $dto = PaymentResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(PaymentResponseDTO::class);
    }

    public function test_payment_dto_to_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_request');
        $dto = PaymentResponseDTO::fromArray($data);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
    
    public function test_payment_dto_with_fixture(): void
    {
        $data = $this->getFixture("Payment/create_payment_request");

        $dto = PaymentResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(PaymentResponseDTO::class);
    }    

    public function test_payment_dto_validation(): void
    {
        $data = $this->getFixture("Payment/create_payment_request");
        
        $dto = PaymentResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(PaymentResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}