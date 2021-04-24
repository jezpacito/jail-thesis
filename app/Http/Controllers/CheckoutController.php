<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Cottage $cottage, Request $request)
    {   
    
            $stripe=  \Stripe\Stripe::setApiKey('sk_test_51IjU43AjEcg5jEfIK9bgGTFzW5JFA9TZrDppJQBTqkgYreuvOqUeBcTRqcuGs02oa4StVqQslWUm4c3mIC1L4MFN00OsYrOw3p');
            if($request->rate == 'night'){
                $amount = $cottage->nightRate;
                $pay = $cottage->nightRate;
                $amount *= $cottage->nightRate;
                $amount = (int) $amount;
                
            }
            if($request->rate == 'day'){
                $amount = $cottage->dayRate;
                $pay = $cottage->dayRate;
                $amount *= $cottage->dayRate;
                $amount = (int) $amount;
            
            }
        // Enter Your Stripe Secret
      $intent =  DB::transaction(function () use($amount){
    
              $payment_intent = \Stripe\PaymentIntent::create([
                  'description' => 'Stripe Test Payment',
                  'amount' => $amount,
                  'currency' => 'PHP',
                  'description' => 'Reservation Payment for IML Eco Park',
                  'payment_method_types' => ['card'],
              ]);
              $intent = $payment_intent->client_secret; 
      
             //payment db
          

              return $intent;
        });
           
     

		return view('checkout.credit-card',compact('intent','cottage','pay'));

    }

    public function afterPayment(Request $request)
    {
       $cottage = Cottage::find($request->cottage_id);

          //booking code
          $time = Carbon::parse($request->booking)->toTimeString();
          $date = Carbon::parse($request->booking)->toDateString();
          $time_type = date('A', strtotime($request->booking));
  
          DB::transaction(function () use ($time,$request,$time_type,$date,$cottage){
              $booking = Booking::create([
                  'number_persion' =>$request->number_persion,
                  'booking_date' =>$date,
                  'booking_time' =>$time,
                  'guest_id' =>auth()->user()->id,
                  'time_type' =>$time_type,
                  'cottage_id' =>request()->cottage_id
              ]);
              if($request->rate ==$cottage->dayRate){
           
                 $booking->cottage->update([
                    'isDayAvailable' =>false
                ]);
              }if($request->rate ==$cottage->dayRate){
                  $booking->cottage->update([
                      'isNightAvailable' =>false
                  ]);
              }
            
          });
        
        return redirect()->route('/')->with('success','Payment Has been Received!');
    }
}