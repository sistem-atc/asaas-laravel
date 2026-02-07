<?php

namespace SistemAtc\Asaas\DTO\Webhook;

use SistemAtc\Asaas\Bases\BaseEventDTO;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\DTO\Shared\Webhook\Account;
use SistemAtc\Asaas\DTO\Shared\Webhook\AccessToken;
use SistemAtc\Asaas\Traits\CastToArray;

class AccessTokenWebhookDTO extends BaseEventDTO
{

    use CastToArray;

    public function __construct(
        ?string $id,
        ?WebhookEventAsaas $event,
        ?string $dateCreated,
        ?Account $account,
        public readonly ?AccessToken $accessToken,
    ) {
        parent::__construct($id, $event, $dateCreated, $account);
    }

    public static function fromArray(array $data): static
    {
        $params = static::getBaseParams($data);

        return new static(
            ...$params,
            accessToken: isset($data['accessToken']) ? AccessToken::fromArray($data['accessToken']) : null,
        );
    }
}