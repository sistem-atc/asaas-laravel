<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\ListAnticipationDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListAnticipationDTOTest extends TestCase
{
    public function test_create_list_anticipation_dto_from_array(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAnticipationDTO::class);
    }

    public function test_list_anticipation_dto_to_array(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        $dto = ListAnticipationDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListAnticipationDTO::class);
    }    
    public function test_list_anticipation_dto_validation(): void
    {
        $data = $this->getFixture("Anticipation/list_anticipations_response");
        
        $dto = ListAnticipationDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListAnticipationDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}