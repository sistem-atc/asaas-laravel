<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\AccountStatus;

class AccountStatusWebhookDTO extends BaseEventDTO
{
    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?AccountStatus $accountStatus,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            accountStatus: isset($data['accountStatus']) ? AccountStatus::fromArray($data['accountStatus']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            array_merge(parent::toArray(),
            [
                'accountStatus' => $this->accountStatus?->toArray(),
            ]),
            fn($value) => !is_null($value)
        );
    }

}
