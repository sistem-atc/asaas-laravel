<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Anticipation;

use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RequestAnticipationDTOTest extends TestCase
{
    public function test_can_create_with_document(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'doc');
        file_put_contents($filePath, 'document content');
        
        try {
            $dto = new RequestAnticipationDTO(
                installment: 'inst_123456',
                payment: 'pay_789012',
                documentFilePath: $filePath,
            );

            expect($dto)->toBeInstanceOf(RequestAnticipationDTO::class)
                ->and($dto->installment)->toBe('inst_123456')
                ->and($dto->payment)->toBe('pay_789012');
        } finally {
            unlink($filePath);
        }
    }

    public function test_can_create_without_document(): void
    {
        $dto = new RequestAnticipationDTO(
            installment: null,
            payment: 'pay_789012',
            documentFilePath: null,
        );

        expect($dto)->toBeInstanceOf(RequestAnticipationDTO::class)
            ->and($dto->payment)->toBe('pay_789012')
            ->and($dto->documentFilePath)->toBeNull();
    }
    
    public function test_throws_exception_for_missing_document(): void
    {
        expect(function () {
            new RequestAnticipationDTO(
                installment: null,
                payment: 'pay_123',
                documentFilePath: '/nonexistent/document.pdf',
            );
        })->toThrow(\InvalidArgumentException::class);
    }

    public function test_can_convert_to_multipart(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'doc');
        file_put_contents($filePath, 'document content');
        
        try {
            $dto = new RequestAnticipationDTO(
                installment: null,
                payment: 'pay_123',
                documentFilePath: $filePath,
            );
            
            $result = $dto->toMultipart();
            
            expect($result)->toBeArray();
        } finally {
            unlink($filePath);
        }
    }
}