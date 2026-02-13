<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Response\Payment\PaymentDTO;
use SistemAtc\Asaas\Tests\TestCase;

class CreditCardPaymentDTOTest extends TestCase
{
    public function test_create_credit_card_payment_dto_from_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_response');
        $dto = PaymentDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(PaymentDTO::class);
    }

    public function test_credit_card_payment_dto_to_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_response');
        $dto = PaymentDTO::fromArray($data);
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
    
    public function test_credit_card_payment_dto_validation(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_response');
        $dto = PaymentDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(PaymentDTO::class);
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}