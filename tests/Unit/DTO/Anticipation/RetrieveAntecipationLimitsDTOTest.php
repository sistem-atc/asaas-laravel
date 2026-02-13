<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAntecipationLimitsDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RetrieveAntecipationLimitsDTOTest extends TestCase
{
    public function test_create_retrieve_antecipation_limits_dto_from_array(): void
    {
        $data = [
            'availableAnticipationAmount' => 5000,
        ];

        $dto = RetrieveAntecipationLimitsDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAntecipationLimitsDTO::class);
    }

    public function test_retrieve_antecipation_limits_dto_to_array(): void
    {
        $data = [
            'availableAnticipationAmount' => 5000,
        ];

        $dto = RetrieveAntecipationLimitsDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_retrieve_antecipation_limits_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/retrieve_anticipation_limits_response");

        $dto = RetrieveAntecipationLimitsDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAntecipationLimitsDTO::class);
    }    
    public function test_retrieve_antecipation_limits_dto_validation(): void
    {
        $data = [
            'availableAnticipationAmount' => 5000,
        ];

        $dto = RetrieveAntecipationLimitsDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RetrieveAntecipationLimitsDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}