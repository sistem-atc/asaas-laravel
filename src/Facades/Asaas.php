<?php

namespace SistemAtc\Asaas\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\Asaas\Methods\AccountDocument accountDocument()
 * @method static \App\Services\Asaas\Methods\Accountinfo accountinfo()
 * @method static \App\Services\Asaas\Methods\Anticipation anticipation()
 * @method static \App\Services\Asaas\Methods\Bill bill()
 * @method static \App\Services\Asaas\Methods\Chargeback chargeback()
 * @method static \App\Services\Asaas\Methods\Checkout checkout()
 * @method static \App\Services\Asaas\Methods\CreditBureauReport creditBureauReport()
 * @method static \App\Services\Asaas\Methods\CreditCard creditCard()
 * @method static \App\Services\Asaas\Methods\Customer customer()
 * @method static \App\Services\Asaas\Methods\EscrowAccount escrowAccount()
 * @method static \App\Services\Asaas\Methods\Finance finance()
 * @method static \App\Services\Asaas\Methods\FinancialTransaction financialTransaction()
 * @method static \App\Services\Asaas\Methods\FiscalInfo fiscalInfo()
 * @method static \App\Services\Asaas\Methods\Installment installment()
 * @method static \App\Services\Asaas\Methods\Invoice invoice()
 * @method static \App\Services\Asaas\Methods\MobilePhoneRecharge mobilePhoneRecharge()
 * @method static \App\Services\Asaas\Methods\Notification notification()
 * @method static \App\Services\Asaas\Methods\Payment payment()
 * @method static \App\Services\Asaas\Methods\PaymentDocument paymentDocument()
 * @method static \App\Services\Asaas\Methods\PaymentDunning paymentDunning()
 * @method static \App\Services\Asaas\Methods\PaymentLink paymentLink()
 * @method static \App\Services\Asaas\Methods\PaymentRefund paymentRefund()
 * @method static \App\Services\Asaas\Methods\PaymentSplit paymentSplit()
 * @method static \App\Services\Asaas\Methods\Pix pix()
 * @method static \App\Services\Asaas\Methods\RecurringPix recurringPix()
 * @method static \App\Services\Asaas\Methods\Subaccount subaccount()
 * @method static \App\Services\Asaas\Methods\Subscription subscription()
 * @method static \App\Services\Asaas\Methods\Transfer transfer()
 * @method static \App\Services\Asaas\Methods\Webhook webhook()
 */
class Asaas extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'asaas';
    }
}
