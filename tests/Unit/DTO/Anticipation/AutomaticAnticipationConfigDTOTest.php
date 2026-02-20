<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\AutomaticAnticipationConfigResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class AutomaticAnticipationConfigDTOTest extends TestCase
{
    public function test_create_automatic_anticipation_config_dto_from_array(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(AutomaticAnticipationConfigResponseDTO::class);
    }

    public function test_automatic_anticipation_config_dto_to_array(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_automatic_anticipation_config_dto_validation(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(AutomaticAnticipationConfigResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}