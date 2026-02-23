<?php

namespace SistemAtc\Asaas\DTO\Response\FiscalInfo;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\AuthenticationType;
use SistemAtc\Asaas\DTO\Shared\Common\TaxRegime;

final class ListMunicipalConfigurationResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?AuthenticationType $authenticationType = null,
        public readonly ?bool $supportsCancellation = null,
        public readonly ?bool $usesSpecialTaxRegimes = null,
        public readonly ?bool $usesServiceListItem = null,
        #[ArrayOf(TaxRegime::class)] public readonly ?array $specialTaxRegimesList = null,
        #[ArrayOf(TaxRegime::class)] public readonly ?array $nationalPortalTaxCalculationRegimeList = null,
        public readonly ?string $nationalPortalTaxCalculationRegimeHelp = null,
        public readonly ?string $municipalInscriptionHelp = null,
        public readonly ?string $specialTaxRegimeHelp = null,
        public readonly ?string $serviceListItemHelp = null,
        public readonly ?string $digitalCertificatedHelp = null,
        public readonly ?string $accessTokenHelp = null,
        public readonly ?string $municipalServiceCodeHelp = null,
    ) {}
}