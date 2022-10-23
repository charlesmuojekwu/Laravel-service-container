<?php

namespace App\Billing;
use Illuminate\Support\Str;


class CreditCardsPaymentGateway implements PaymentGatewayInterface
{

    private $discount;

    public function __construct(private $currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }


    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }


    public function charge($amount)
    {

        // charge the credit card

        $fees = $amount * 0.03;

        return [
            'amount' => ($amount - $this->discount) + $fees,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees,
        ];
    }
}
