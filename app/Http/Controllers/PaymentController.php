<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;

use Stripe;
use Session;

class PaymentController extends Controller
{

    
  
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 120 * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill." 
        ]);
        return redirect('/shop')->with('status','Payment successfully completed, Thanks for your Purchase');
        // Session::flash('success', 'Payment successfully made, Thanks for your Purchase');
          
        // return back();
    
    }
}