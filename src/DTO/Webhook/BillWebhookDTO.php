<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Bill;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;

class BillWebhookDTO extends BaseEventDTO
{

    use CastToArray;

    public function __construct(
        ?string $id = null,
        ?WebhookEventAsaas $event = null,
        ?string $dateCreated = null,
        ?Account $account = null,
        public readonly ?Bill $bill = null,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            bill: isset($data['bill']) ? Bill::fromArray($data['bill']) : null,
        );
    }
}