<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDunning;

use SistemAtc\Asaas\Enum\DunningType;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class PaymentDunningRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly string $payment,
        public readonly DunningType $type,
        public readonly ?string $description = null,
        public readonly string $customerName,
        public readonly string $customerCpfCnpj,
        public readonly string $customerPrimaryPhone,
        public readonly ?string $customerSecondaryPhone = null,
        public readonly string $customerPostalCode,
        public readonly string $customerAddress,
        public readonly string $customerAddressNumber,
        public readonly ?string $customerComplement = null,
        public readonly string $customerProvince,
        #[MultipartFile(as: 'documents')] public readonly ?string $documents = null,
    ) {}
}