<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\Enum\StatusPixPayment;
use SistemAtc\Asaas\DTO\Shared\Response\Authorization;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\SinglePaymentResponseDTO;

class SinglePaymentResponseDTOTest extends TestCase
{
    public function test_create_single_payment_response_dto_from_array(): void
    {
        $data = [
            'id' => 'pip_123',
            'endToEndIdentifier' => true,
            'authorization' => [
                'id' => 'aut_123',
                'customerId' => 'cus_123',
            ],
            'status' => 'SCHEDULED',
            'paymentId' => 'pay_123',
        ];

        $dto = SinglePaymentResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SinglePaymentResponseDTO::class)
            ->and($dto->status)->toBe(StatusPixPayment::SCHEDULED)
            ->and($dto->authorization)->toBeInstanceOf(Authorization::class);
    }

    public function test_single_payment_response_dto_to_array(): void
    {
        $data = [
            'id' => 'pip_123',
            'endToEndIdentifier' => true,
            'status' => 'SCHEDULED',
            'paymentId' => 'pay_123',
        ];

        $dto = SinglePaymentResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['status'])->toBe('SCHEDULED');
    }
}
