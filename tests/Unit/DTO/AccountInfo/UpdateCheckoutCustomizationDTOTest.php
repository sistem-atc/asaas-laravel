<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class UpdateCheckoutCustomizationDTOTest extends TestCase
{
    public function test_can_create_with_logo_file(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'logo');
        file_put_contents($filePath, 'logo content');
        
        try {
            $dto = new UpdateCheckoutCustomizationRequestDTO(
                logoBackgroundColor: "#FF0000",
                infoBackgroundColor: "#FF0000",
                fontColor: "#FF0000",
                enabled: true,
                logoFilePath: $filePath,
            );

            expect($dto)->toBeInstanceOf(UpdateCheckoutCustomizationRequestDTO::class)
                ->and($dto->logoBackgroundColor)->toBe('#FF0000')
                ->and($dto->enabled)->toBeTrue();
        } finally {
            unlink($filePath);
        }
    }

    public function test_can_create_without_logo(): void
    {
        $dto = new UpdateCheckoutCustomizationRequestDTO(
            logoBackgroundColor: "#FF0000",
            infoBackgroundColor: "#FF0000",
            fontColor: "#FF0000",
            enabled: false,
            logoFilePath: null,
        );

        expect($dto)->toBeInstanceOf(UpdateCheckoutCustomizationRequestDTO::class)
            ->and($dto->enabled)->toBeFalse()
            ->and($dto->logoFilePath)->toBeNull();
    }
    
    public function test_throws_exception_for_missing_logo_file(): void
    {
        expect(function () {
            new UpdateCheckoutCustomizationRequestDTO(
                logoBackgroundColor: "#FF0000",
                infoBackgroundColor: "#FF0000",
                fontColor: "#FF0000",
                enabled: true,
                logoFilePath: '/nonexistent/logo.png',
            );
        })->toThrow(\InvalidArgumentException::class);
    }
}