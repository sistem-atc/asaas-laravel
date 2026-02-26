<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\Authorization;
use SistemAtc\Asaas\DTO\Shared\Webhook\PaymentInstruction;

class PixWebhookDTO extends BaseEventDTO
{

    use CastToArray;

    public function __construct(
        ?string $id = null,
        ?WebhookEventAsaas $event = null,
        ?string $dateCreated = null,
        ?Account $account = null,
        public readonly ?Authorization $authorization = null,
        public readonly ?PaymentInstruction $paymentInstruction = null,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            authorization: isset($data['authorization']) ? Authorization::fromArray($data['authorization']) : null,
            paymentInstruction: isset($data['paymentInstruction']) ? PaymentInstruction::fromArray($data['paymentInstruction']) : null,
        );
    }
}