<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class UpdateAutomaticAnticipationDTOTest extends TestCase
{
    public function test_create_update_automatic_anticipation_dto_from_array(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationRequestDTO::class);
    }

    public function test_update_automatic_anticipation_dto_to_array(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_update_automatic_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/update_status_of_automatic_anticipation_request");

        $dto = UpdateAutomaticAnticipationRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationRequestDTO::class);
    }    
    public function test_update_automatic_anticipation_dto_validation(): void
    {
        $data = [
            'enabled' => true,
        ];

        $dto = UpdateAutomaticAnticipationRequestDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(UpdateAutomaticAnticipationRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}