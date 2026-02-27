<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Enum\StatusPix;
use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationRequestDTO;

class ListAuthorizationRequestDTOTest extends TestCase
{
    public function test_create_list_authorization_request_dto_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
            'status' => 'ACTIVE',
            'customerId' => 'cus_123',
        ];

        $dto = ListAuthorizationRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAuthorizationRequestDTO::class)
            ->and($dto->status)->toBe(StatusPix::ACTIVE);
    }

    public function test_list_authorization_request_dto_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
            'status' => 'ACTIVE',
            'customerId' => 'cus_123',
        ];

        $dto = ListAuthorizationRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['status'])->toBe('ACTIVE');
    }
}
