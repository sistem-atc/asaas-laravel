<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Request\Payment\PayChargeWithCreditCardRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class PayChargeWithCreditCardDTOTest extends TestCase
{
    public function test_create_pay_charge_with_credit_card_dto_from_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_request');
        $dto = PayChargeWithCreditCardRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(PayChargeWithCreditCardRequestDTO::class);
    }

    public function test_pay_charge_with_credit_card_dto_to_array(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_request');
        $dto = PayChargeWithCreditCardRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_pay_charge_with_credit_card_dto_validation(): void
    {
        $data = $this->getFixture('Payment/create_payment_with_creditcard_request');
        $dto = PayChargeWithCreditCardRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(PayChargeWithCreditCardRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}