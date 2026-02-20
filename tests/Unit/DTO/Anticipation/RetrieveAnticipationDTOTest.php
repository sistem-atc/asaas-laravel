<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAnticipationResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RetrieveAnticipationDTOTest extends TestCase
{
    public function test_create_retrieve_anticipation_dto_from_array(): void
    {
        $data = [
            'id' => 'ant_123456',
            'status' => 'PENDING',
            'installment' => 'inst_123456',
        ];

        $dto = RetrieveAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAnticipationResponseDTO::class);
    }

    public function test_retrieve_anticipation_dto_to_array(): void
    {
        $data = [
            'id' => 'ant_123456',
            'status' => 'PENDING',
            'installment' => 'inst_123456',
        ];

        $dto = RetrieveAnticipationResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_retrieve_anticipation_dto_with_fixture(): void
    {
        $data = $this->getFixture("Anticipation/retrieve_a_single_anticipation_response");

        $dto = RetrieveAnticipationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAnticipationResponseDTO::class);
    }    
    public function test_retrieve_anticipation_dto_validation(): void
    {
        $data = [
            'id' => 'ant_123456',
            'status' => 'PENDING',
            'installment' => 'inst_123456',
        ];

        $dto = RetrieveAnticipationResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RetrieveAnticipationResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}