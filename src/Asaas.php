<?php

namespace SistemAtc\Asaas;

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Bases\BaseMethods;
use Illuminate\Http\Client\PendingRequest;
use SistemAtc\Asaas\Services\AsaasServiceRegistry;

/**
 * @method \SistemAtc\Asaas\Methods\AccountDocument accountDocument()
 * @method \SistemAtc\Asaas\Methods\AccountInfo accountInfo()
 * @method \SistemAtc\Asaas\Methods\Anticipation anticipation()
 * @method \SistemAtc\Asaas\Methods\Bill bill()
 * @method \SistemAtc\Asaas\Methods\Chargeback chargeback()
 * @method \SistemAtc\Asaas\Methods\Checkout checkout()
 * @method \SistemAtc\Asaas\Methods\CreditBureauReport creditBureauReport()
 * @method \SistemAtc\Asaas\Methods\CreditCard creditCard()
 * @method \SistemAtc\Asaas\Methods\Customer customer()
 * @method \SistemAtc\Asaas\Methods\EscrowAccount escrowAccount()
 * @method \SistemAtc\Asaas\Methods\Finance finance()
 * @method \SistemAtc\Asaas\Methods\FinancialTransaction financialTransaction()
 * @method \SistemAtc\Asaas\Methods\FiscalInfo fiscalInfo()
 * @method \SistemAtc\Asaas\Methods\Invoice invoice()
 * @method \SistemAtc\Asaas\Methods\Installment installment()
 * @method \SistemAtc\Asaas\Methods\MobilePhoneRecharge mobilePhoneRecharge()
 * @method \SistemAtc\Asaas\Methods\Notification notification()
 * @method \SistemAtc\Asaas\Methods\Payment payment()
 * @method \SistemAtc\Asaas\Methods\PaymentDocument paymentDocument()
 * @method \SistemAtc\Asaas\Methods\PaymentDunning paymentDunning()
 * @method \SistemAtc\Asaas\Methods\PaymentLink paymentLink()
 * @method \SistemAtc\Asaas\Methods\PaymentRefund paymentRefund()
 * @method \SistemAtc\Asaas\Methods\PaymentWithSummaryData paymentWithSummaryData()
 * @method \SistemAtc\Asaas\Methods\PaymentSplit paymentSplit()
 * @method \SistemAtc\Asaas\Methods\Pix pix()
 * @method \SistemAtc\Asaas\Methods\PixTransaction pixTransaction()
 * @method \SistemAtc\Asaas\Methods\AutomaticPix automaticPix()
 * @method \SistemAtc\Asaas\Methods\RecurringPix recurringPix()
 * @method \SistemAtc\Asaas\Methods\Subaccount subAccount()
 * @method \SistemAtc\Asaas\Methods\Subscription subscription()
 * @method \SistemAtc\Asaas\Methods\Transfer transfer()
 * @method \SistemAtc\Asaas\Methods\Webhook webhook()
 */
class Asaas
{
    protected PendingRequest $client;
    protected array $instances = [];
    protected string $baseUrl;
    protected string $version;
    protected string $accessToken;
    protected string $pixKey;

    public function __construct()
    {
        $environment = config('asaas.environment');
        if (!in_array($environment, ['sandbox', 'production'])) {
            throw new \InvalidArgumentException("Invalid environment: {$environment}. Must be 'sandbox' or 'production'.");
        }
        
        $this->baseUrl = config("asaas.{$environment}.base_url") ?? '';
        $this->version = config("asaas.{$environment}.version") ?? '';
        $this->accessToken = config("asaas.{$environment}.access_token") ?? '';
        $this->pixKey = config("asaas.{$environment}.pix_key") ?? '';

        if (empty($this->baseUrl)) {
            throw new \RuntimeException("Asaas base URL is not configured for environment: {$environment}");
        }

        if (empty($this->accessToken)) {
            throw new \RuntimeException("Asaas access token is not configured for environment: {$environment}");
        }

        $this->client = Http::baseUrl($this->baseUrl . '/' . $this->version)
            ->withHeaders([
                'access_token' => $this->accessToken,
            ]);
    }

    public function service(string $name): BaseMethods
    {
        if (! isset($this->instances[$name])) {
            $map = AsaasServiceRegistry::map();

            if (! isset($map[$name])) {
                throw new \InvalidArgumentException("Asaas method [$name] not registered.");
            }

            $this->instances[$name] = app(
                $map[$name],
                [
                    'httpClient' => $this->client,
                ]
            );
        }

        return $this->instances[$name];
    }

    public function __call(string $name, array $arguments): BaseMethods
    {
        return $this->service($name);
    }
}
