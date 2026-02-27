<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\SinglePaymentResponseDTO;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\ListAuthorizationPaymentResponseDTO;

class ListAuthorizationPaymentResponseDTOTest extends TestCase
{
    public function test_create_list_authorization_payment_response_dto_from_array(): void
    {
        $data = [
            'object' => 'list',
            'hasMore' => false,
            'totalCount' => 1,
            'limit' => 50,
            'offset' => 0,
            'data' => [
                [
                    'id' => 'pip_123',
                    'status' => 'SCHEDULED',
                ],
            ],
        ];

        $dto = ListAuthorizationPaymentResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAuthorizationPaymentResponseDTO::class)
            ->and($dto->data)->toBeArray()
            ->and($dto->data[0])->toBeInstanceOf(SinglePaymentResponseDTO::class);
    }

    public function test_list_authorization_payment_response_dto_to_array(): void
    {
        $data = [
            'object' => 'list',
            'hasMore' => false,
            'totalCount' => 1,
            'limit' => 50,
            'offset' => 0,
        ];

        $dto = ListAuthorizationPaymentResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['object'])->toBe('list');
    }
}
