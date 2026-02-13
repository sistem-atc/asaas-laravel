<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\AutomaticAnticipationConfigDTO;
use SistemAtc\Asaas\Tests\TestCase;

class AutomaticAnticipationConfigDTOTest extends TestCase
{
    public function test_create_automatic_anticipation_config_dto_from_array(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(AutomaticAnticipationConfigDTO::class);
    }

    public function test_automatic_anticipation_config_dto_to_array(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_automatic_anticipation_config_dto_validation(): void
    {
        $data = $this->getFixture('Anticipation/retrieve_status_of_automatic_anticipation_response');
        $dto = AutomaticAnticipationConfigDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(AutomaticAnticipationConfigDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}