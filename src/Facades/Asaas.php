<?php

namespace SistemAtc\Asaas\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SistemAtc\Asaas\Methods\AccountDocument accountDocument()
 * @method static \SistemAtc\Asaas\Methods\AccountInfo accountInfo()
 * @method static \SistemAtc\Asaas\Methods\Anticipation anticipation()
 * @method static \SistemAtc\Asaas\Methods\Bill bill()
 * @method static \SistemAtc\Asaas\Methods\Chargeback chargeback()
 * @method static \SistemAtc\Asaas\Methods\Checkout checkout()
 * @method static \SistemAtc\Asaas\Methods\CreditBureauReport creditBureauReport()
 * @method static \SistemAtc\Asaas\Methods\CreditCard creditCard()
 * @method static \SistemAtc\Asaas\Methods\Customer customer()
 * @method static \SistemAtc\Asaas\Methods\EscrowAccount escrowAccount()
 * @method static \SistemAtc\Asaas\Methods\Finance finance()
 * @method static \SistemAtc\Asaas\Methods\FinancialTransaction financialTransaction()
 * @method static \SistemAtc\Asaas\Methods\FiscalInfo fiscalInfo()
 * @method static \SistemAtc\Asaas\Methods\Installment installment()
 * @method static \SistemAtc\Asaas\Methods\Invoice invoice()
 * @method static \SistemAtc\Asaas\Methods\MobilePhoneRecharge mobilePhoneRecharge()
 * @method static \SistemAtc\Asaas\Methods\Notification notification()
 * @method static \SistemAtc\Asaas\Methods\Payment payment()
 * @method static \SistemAtc\Asaas\Methods\PaymentDocument paymentDocument()
 * @method static \SistemAtc\Asaas\Methods\PaymentDunning paymentDunning()
 * @method static \SistemAtc\Asaas\Methods\PaymentLink paymentLink()
 * @method static \SistemAtc\Asaas\Methods\PaymentRefund paymentRefund()
 * @method static \SistemAtc\Asaas\Methods\PaymentSplit paymentSplit()
 * @method static \SistemAtc\Asaas\Methods\Pix pix()
 * @method static \SistemAtc\Asaas\Methods\PixTransaction pixTransaction()
 * @method static \SistemAtc\Asaas\Methods\RecurringPix recurringPix()
 * @method static \SistemAtc\Asaas\Methods\Subaccount subaccount()
 * @method static \SistemAtc\Asaas\Methods\Subscription subscription()
 * @method static \SistemAtc\Asaas\Methods\Transfer transfer()
 * @method static \SistemAtc\Asaas\Methods\Webhook webhook()
 * @method \SistemAtc\Asaas\Methods\AutomaticPix automaticPix()
 * @method \SistemAtc\Asaas\Methods\PaymentWithSummaryData paymentWithSummaryData()
 */
class Asaas extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'asaas';
    }
}
