<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\SimulateAnticipationResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class SimulateAnticipationDTOTest extends TestCase
{
    public function test_create_simulate_anticipation_dto_from_array(): void
    {
        $data = [
            'anticipatedValue' => 900,
        ];

        $dto = SimulateAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SimulateAnticipationResponseDTO::class);
    }

    public function test_simulate_anticipation_dto_to_array(): void
    {
        $data = [
            'anticipatedValue' => 900,
        ];

        $dto = SimulateAnticipationResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_simulate_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/simulate_anticipation_response");

        $dto = SimulateAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SimulateAnticipationResponseDTO::class);
    }    
    public function test_simulate_anticipation_dto_validation(): void
    {
        $data = [
            'anticipatedValue' => 900,
        ];

        $dto = SimulateAnticipationResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(SimulateAnticipationResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}