<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Response\Payment\PaymentDTO;
use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Tests\TestCase;

class PaymentResponseDTOTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_response');        
        $dto = PaymentDTO::fromArray($data);
        
        expect($dto)->toBeInstanceOf(PaymentDTO::class)
            ->and($dto->id)->toBe('pay_080225913252')
            ->and($dto->value)->toBe(129.9)
            ->and($dto->status)->toBe(StatusPayment::PENDING);
    }
    
    public function test_can_convert_to_array(): void
    {
    
        $data = $this->getFixture('Payment/create_payment_response');
        $dto = PaymentDTO::fromArray($data);
        
        $array = $dto->toArray();
        
        expect($array)->toBeArray()
            ->and($array['id'])->toBe('pay_080225913252');
    }
    
    public function test_with_fixture_data(): void
    {
        $data = $this->getFixture('Payment/create_payment_response');
        $dto = PaymentDTO::fromArray($data);
        
        expect($dto)->toBeInstanceOf(PaymentDTO::class)
            ->and($dto->id)->not()->toBeNull();
    }
}
