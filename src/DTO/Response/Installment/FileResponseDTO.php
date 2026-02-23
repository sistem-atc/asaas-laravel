<?php

namespace SistemAtc\Asaas\DTO\Response\Installment;

class FileResponseDTO
{
    public function __construct(
        public readonly string $contents,
        public readonly string $contentType = 'application/pdf',
        public readonly ?string $filename = null
    ) {}

    public function save(string $path): bool
    {
        return file_put_contents($path, $this->contents) !== false;
    }

    public function toBase64(): string
    {
        return base64_encode($this->contents);
    }
}