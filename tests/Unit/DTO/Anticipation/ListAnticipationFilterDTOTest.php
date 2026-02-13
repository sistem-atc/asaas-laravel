<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListAnticipationFilterDTOTest extends TestCase
{
    public function test_create_list_anticipation_filter_dto_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListAnticipationFilterDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAnticipationFilterDTO::class);
    }

    public function test_list_anticipation_filter_dto_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListAnticipationFilterDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_anticipation_filter_dto_validation(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListAnticipationFilterDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListAnticipationFilterDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}