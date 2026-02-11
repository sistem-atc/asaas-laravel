<?php

namespace SistemAtc\Asaas\Tests\Traits;

trait InteractsWithFixtures
{
    protected function getFixture(string $path): array
    {
        $fullPath = __DIR__ . "/../Fixtures/{$path}.json";
        
        if (!file_exists($fullPath)) {
            throw new \InvalidArgumentException("Fixture não encontrada no caminho: {$fullPath}");
        }

        $content = file_get_contents($fullPath);
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Erro ao decodificar JSON da fixture: " . json_last_error_msg());
        }

        return $data;
    }
}