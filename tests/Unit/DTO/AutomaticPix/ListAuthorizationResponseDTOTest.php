<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\ListAuthorizationResponseDTO;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\CreateAuthorizationResponseDTO;

class ListAuthorizationResponseDTOTest extends TestCase
{
    public function test_create_list_authorization_response_dto_from_array(): void
    {
        $data = [
            'object' => 'list',
            'hasMore' => false,
            'totalCount' => 1,
            'limit' => 50,
            'offset' => 0,
            'data' => [
                [
                    'id' => 'aut_123',
                    'status' => 'ACTIVE',
                ],
            ],
        ];

        $dto = ListAuthorizationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAuthorizationResponseDTO::class)
            ->and($dto->data)->toBeArray()
            ->and($dto->data[0])->toBeInstanceOf(CreateAuthorizationResponseDTO::class);
    }

    public function test_list_authorization_response_dto_to_array(): void
    {
        $data = [
            'object' => 'list',
            'hasMore' => false,
            'totalCount' => 1,
            'limit' => 50,
            'offset' => 0,
        ];

        $dto = ListAuthorizationResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['object'])->toBe('list');
    }
}
