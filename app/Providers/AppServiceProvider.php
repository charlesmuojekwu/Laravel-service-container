<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditCardsPaymentGateway;
use App\Billing\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayInterface::class, function($app){

            if(request()->has('credit'))
            {
                return new CreditCardsPaymentGateway('USD');
            }

            return new BankPaymentGateway('USD');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
