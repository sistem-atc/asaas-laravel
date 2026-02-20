<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\ListAnticipationResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListAnticipationDTOTest extends TestCase
{
    public function test_create_list_anticipation_dto_from_array(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAnticipationResponseDTO::class);
    }

    public function test_list_anticipation_dto_to_array(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAnticipationResponseDTO::class);
    }    
    public function test_list_anticipation_dto_validation(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        
        $dto = ListAnticipationResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListAnticipationResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}