<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Enum\StatusPixPayment;
use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationPaymentsRequestDTO;

class ListAuthorizationPaymentsRequestDTOTest extends TestCase
{
    public function test_create_list_authorization_payments_request_dto_from_array(): void
    {
        $data = [
            'authorizationId' => 'aut_123',
            'customerId' => 'cus_123',
            'paymentId' => 'pay_123',
            'status' => 'SCHEDULED',
        ];

        $dto = ListAuthorizationPaymentsRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAuthorizationPaymentsRequestDTO::class)
            ->and($dto->status)->toBe(StatusPixPayment::SCHEDULED);
    }

    public function test_list_authorization_payments_request_dto_to_array(): void
    {
        $data = [
            'authorizationId' => 'aut_123',
            'customerId' => 'cus_123',
            'paymentId' => 'pay_123',
            'status' => 'SCHEDULED',
        ];

        $dto = ListAuthorizationPaymentsRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['status'])->toBe('SCHEDULED');
    }
}
