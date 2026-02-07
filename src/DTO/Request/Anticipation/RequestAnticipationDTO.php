<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use InvalidArgumentException;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

class RequestAnticipationDTO implements DTOInterfaceMultipart
{
 
    public function __construct(
        public readonly ?string $installment,
        public readonly ?string $payment,
        public readonly ?string $documentFilePath,
    ) {
        if ($this->documentFilePath && !file_exists($this->documentFilePath)) {
            throw new InvalidArgumentException("O documento para antecipação não foi encontrado em: {$this->documentFilePath}");
        }
    }

    public function toMultipart(): array
    {
        $multipart = [];

        if ($this->installment) {
            $multipart[] = [
                'name'     => 'installment',
                'contents' => $this->installment,
            ];
        }

        if ($this->payment) {
            $multipart[] = [
                'name'     => 'payment',
                'contents' => $this->payment,
            ];
        }

        if ($this->documentFilePath) {
            $multipart[] = [
                'name'     => 'documents',
                'contents' => fopen($this->documentFilePath, 'r'),
                'filename' => basename($this->documentFilePath)
            ];
        }

        return [
            'multipart' => $multipart
        ];
    }
}