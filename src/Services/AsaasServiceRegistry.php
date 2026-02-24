<?php

namespace SistemAtc\Asaas\Services;

class AsaasServiceRegistry
{
    public static function map(): array
    {
        return [
            'accountDocument' =>        \SistemAtc\Asaas\Methods\AccountDocument::class,
            'accountInfo' =>            \SistemAtc\Asaas\Methods\AccountInfo::class,
            'anticipation' =>           \SistemAtc\Asaas\Methods\Anticipation::class,
            'bill' =>                   \SistemAtc\Asaas\Methods\Bill::class,
            'chargeback' =>             \SistemAtc\Asaas\Methods\Chargeback::class,
            'checkout' =>               \SistemAtc\Asaas\Methods\Checkout::class,
            'creditBureauReport' =>     \SistemAtc\Asaas\Methods\CreditBureauReport::class,
            'creditCard' =>             \SistemAtc\Asaas\Methods\CreditCard::class,
            'customer' =>               \SistemAtc\Asaas\Methods\Customer::class,
            'escrowAccount' =>          \SistemAtc\Asaas\Methods\EscrowAccount::class,
            'finance' =>                \SistemAtc\Asaas\Methods\Finance::class,
            'financialTransaction' =>   \SistemAtc\Asaas\Methods\FinancialTransaction::class,
            'fiscalInfo' =>             \SistemAtc\Asaas\Methods\FiscalInfo::class,
            'invoice' =>                \SistemAtc\Asaas\Methods\Invoice::class,
            'mobilePhoneRecharge' =>    \SistemAtc\Asaas\Methods\MobilePhoneRecharge::class,
            'notification' =>           \SistemAtc\Asaas\Methods\Notification::class,
            'payment' =>                \SistemAtc\Asaas\Methods\Payment::class,
            'paymentDocument' =>        \SistemAtc\Asaas\Methods\PaymentDocument::class,
            'paymentDunning' =>         \SistemAtc\Asaas\Methods\PaymentDunning::class,
            'paymentLink' =>            \SistemAtc\Asaas\Methods\PaymentLink::class,
            'paymentWithSummaryData' => \SistemAtc\Asaas\Methods\PaymentWithSummaryData::class,
            'paymentRefund' =>          \SistemAtc\Asaas\Methods\PaymentRefund::class,
            'installment' =>            \SistemAtc\Asaas\Methods\Installment::class,
            'paymentSplit' =>           \SistemAtc\Asaas\Methods\PaymentSplit::class,
            'pix' =>                    \SistemAtc\Asaas\Methods\Pix::class,
            'pixTransaction' =>         \SistemAtc\Asaas\Methods\PixTransaction::class,
            'automaticPix' =>           \SistemAtc\Asaas\Methods\AutomaticPix::class,
            'recurringPix' =>           \SistemAtc\Asaas\Methods\RecurringPix::class,
            'subAccount' =>             \SistemAtc\Asaas\Methods\Subaccount::class,
            'subscription' =>           \SistemAtc\Asaas\Methods\Subscription::class,
            'transfer' =>               \SistemAtc\Asaas\Methods\Transfer::class,
            'webhook' =>                \SistemAtc\Asaas\Methods\Webhook::class,
        ];
    }
}
