<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayInterface;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderContorller extends Controller
{
    public function store(OrderDetails $orderDetails,PaymentGatewayInterface $PaymentGateway)
    {
        //$PaymentGateway = new PaymentGateway('USD');
        $order = $orderDetails->all();

        dd($PaymentGateway->charge(2500));
    }
}
