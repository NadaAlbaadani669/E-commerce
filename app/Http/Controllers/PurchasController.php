<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Purchas;
use App\Models\Addres;
use Omnipay\Omnipay;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class PurchasController extends Controller
{
    // private $gateway;

    // public function __construct()
    // {
    //     $this->gateway = Omnipay::create('PayPal_Rest');
    //     // $this->gateway->initialize(array(
    //     //     'clientId' => 'PAYPAL_CLIENT_ID',
    //     //     'secret' => 'PAYPAL_CLIENT_SECRET',
    //     //     'testMode' => true,));
    //     $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
    //     $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
    //     $this->gateway->setTestMode(true);
    // }
    public function __construct()
    {
    /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index()
    {
        if (request()->addres === null) {
            return redirect('/Information')->with('failed','You need to add an addres to your informations to finish buying');
        }
        else
        {
            return view('product.buy',[
                'product' => Product::where('id','=',request()->product_id)->first(),
                'quantity' => request()->quantity,
                'price' => request()->price,
                'address' => Addres::where('user_id', '=',Auth::id())->first()
            ]);
        }
    }

    public function finishBuying()
    {
        $attributes = request()->validate([
            'payment_method' => 'required'
        ]);
        $attributes = [
            'payment_method' => request()->payment_method,
            'product_id' => request()->product,
            'quantity' => request()->quantity,
            'price' => request()->price,
            'buyer_id' => Auth::id(),
            'addres' => request()->addres
        ];

        if($attributes['payment_method'] === 'At the door')
        {
            Purchas::create($attributes);

            $total_amount = request()->quantity;
            $total_price = request()->price;

            $item = Product::where('id','=',request()->product)->first();
            $item->total_profit += $total_price;
            $item->sold_products +=$total_amount;
            $item->quantity -= $total_amount;
            $item->update();

            $cartItem = CartItem::where('cart_id','=',Auth::id())->where('product_id','=',request()->product);
            $cartItem->delete();

            return redirect('/')->with('success','You Buy the item you can see them in my order page');
        }
        else
        {
            define('CLIENT_ID', env('PAYPAL_CLIENT_ID'));
            define('CLIENT_SECRET', env('PAYPAL_CLIENT_SECRET'));
            define('PAYPAL_CURRENCY', 'USD'); // set your currency here

            $gateway = Omnipay::create('PayPal_Rest');

            $gateway->setClientId(CLIENT_ID);
            $gateway->setSecret(CLIENT_SECRET);
            $gateway->setTestMode(true);

            try {

                $price = (int)request()->price;

                $bla = $this->gateway->purchase([
                    'amount' => $price,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error')
                ]);
                $response = $bla->send();
                // if ($response->isSuccessful()) {
                //     return "Thankyou for your payment";
                // }
                // else if($response->isRedirect()) {
                //     return $response->getMessage();
                // }
                // else {
                //     return $response->getMessage();
                // }
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    echo $response->getMessage();
                }
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }

        }



    }
}
