<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\InternalTransferData;

class InternalWebhookDTO extends BaseEventDTO
{
    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?InternalTransferData $internalTransferData,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            internalTransferData: isset($data['internalTransferData']) ? InternalTransferData::fromArray($data['internalTransferData']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(parent::toArray(),
            [
                'internalTransferData' => $this->internalTransferData?->toArray(),
            ]),
            fn($value) => !is_null($value)
        );
    }
}
