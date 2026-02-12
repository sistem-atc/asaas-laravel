<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO;

use SistemAtc\Asaas\Enum\DisputeStatus;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackDisputeResponseDTO;

test('deve hidratar corretamente a resposta de disputa de chargeback', function () {
    $data = [
        'chargebackId' => '2765d086-c7c5-5cca-898a-4262d212587c',
        'status' => 'REQUESTED',
        'files' => [null]
    ];

    $dto = ChargebackDisputeResponseDTO::fromArray($data);

    expect($dto->chargebackId)->toBe('2765d086-c7c5-5cca-898a-4262d212587c')
        ->and($dto->status)->toBe(DisputeStatus::REQUESTED)
        ->and($dto->files)->toBeArray()
        ->and($dto->files[0])->toBeNull();
});