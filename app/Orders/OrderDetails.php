<?php

namespace App\Orders;

use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayInterface;

class OrderDetails
{
    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }


    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'mike',
            'address' => 'No 4 oludele street',
        ];
    }
}
