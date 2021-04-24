<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
 
        // Enter Your Stripe Secret
      $stripe=  \Stripe\Stripe::setApiKey('sk_test_51IjU43AjEcg5jEfIK9bgGTFzW5JFA9TZrDppJQBTqkgYreuvOqUeBcTRqcuGs02oa4StVqQslWUm4c3mIC1L4MFN00OsYrOw3p');
        	
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'PHP',
			'description' => 'Reservation Payment for IML Eco Park',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        
        return redirect()->route('/')->with('success','Payment Has been Received!');
    }
}