<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationDTO;
use SistemAtc\Asaas\Tests\TestCase;

class UpdateAutomaticAnticipationDTOTest extends TestCase
{
    public function test_create_update_automatic_anticipation_dto_from_array(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationDTO::class);
    }

    public function test_update_automatic_anticipation_dto_to_array(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_update_automatic_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/update_status_of_automatic_anticipation_request");

        $dto = UpdateAutomaticAnticipationDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationDTO::class);
    }    
    public function test_update_automatic_anticipation_dto_validation(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}