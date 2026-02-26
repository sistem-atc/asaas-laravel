<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentLink;

use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class AddImagePaymentLinkRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly ?bool $main = null,
        #[MultipartFile(as: 'image')] public readonly ?string $image = null,
    ) {}
}