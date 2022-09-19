<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaypalPaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize(array(
            'clientId' => 'PAYPAL_CLIENT_ID',
            'secret' => 'PAYPAL_CLIENT_SECRET',
            'testMode' => true,));
        // $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        // $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        // $this->gateway->setTestMode(true);
    }



    public function pay()
    {
        // dd('blabla');
        try {
            $price = (int)request()->price;

            $response = $this->gateway->purchase(array(
                'price' => $price,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            dd($response);
            if($response->isRedirect())
            {
                echo('redirected');
            }
            else{
                return $response->getMessage();
            }
        }
        catch(\Throwable $th){
            return 'it is the catching section';
        }

    }
}
