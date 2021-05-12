<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use App\Payment;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;
class CheckoutController extends Controller
{
    public function checkout($id, Request $request)
    {
        $stripe=  \Stripe\Stripe::setApiKey('sk_test_51IjU43AjEcg5jEfIK9bgGTFzW5JFA9TZrDppJQBTqkgYreuvOqUeBcTRqcuGs02oa4StVqQslWUm4c3mIC1L4MFN00OsYrOw3p');

        if($request->has('room')){
            $cottage = Room::findOrFail($id);
            $amount = $cottage->price/2;
            $pay = $cottage->price;
            $amount *= 100;
            $amount = (int) $amount;
            $type = 'room';

        }else{
            $cottage = Cottage::findORFail($id);
            if($request->rate == 'night'){
                $amount = $cottage->nightRate/2;
                $pay = $cottage->nightRate;
                $amount *= 100;
                $amount = (int) $amount;
                $type = 'cottage';
            }
            if($request->rate == 'day'){
                $amount = $cottage->dayRate/2;
                $pay = $cottage->dayRate;
                $amount *= 100;
                //times cent
                $amount = (int) $amount;
                $type = 'cottage';

            }
        }


        // Enter Your Stripe Secret
      $intent =  DB::transaction(function () use($amount){

              $payment_intent = \Stripe\PaymentIntent::create([
//                  'description' => 'Stripe Test Payment',
                  'amount' => $amount,
                  'currency' => 'PHP',
                  'description' => 'Reservation Payment for IML Eco Park',
                  'payment_method_types' => ['card'],
              ]);
              $intent = $payment_intent->client_secret;

             //payment db

              return $intent;
        });



		return view('checkout.credit-card',compact('intent','cottage','pay','type'));

    }

    public function afterPayment(Request $request)
    {
          //booking code
          $time = Carbon::parse($request->booking)->toTimeString();
          $date = Carbon::parse($request->booking)->toDateString();
          $time_type = date('A', strtotime($request->booking));


          DB::transaction(function () use ($time,$request,$time_type,$date){

            if($request->type =='room'){
                $room = request()->cottage_id;
                $cottage = null;
            }


              $booking = Booking::create([
                  'number_persion' =>$request->number_persion,
                  'booking_date' =>$date,
                  'booking_time' =>$time,
                  'guest_id' =>auth()->user()->id,
                  'time_type' =>$time_type,
                  'cottage_id' =>$cottage,
                  'room_id' => $room
              ]);
              $payment = Payment::create([
                'guest_id' =>auth()->user()->id,
                'amount_paid' =>$request->rate/2,
                'ref_no' =>'ref-'.mt_rand()
              ]);

              if($request->type =='cottage'){
                $cottage = Cottage::where('id',$request->cottage_id)->first();

                if($request->rate ==$cottage->dayRate){

                  $data= $cottage->update([
                       'isDayAvailable' =>0
                   ]);
                }if($request->rate ==$cottage->nightRate){
                  // dd('night');
                 $cottage->update([
                  'isNightAvailable' =>0
                  ]);
                }
              }

              $cottage = Room::where('id',$room)->first();
              $cottage->update([
                  'isVacant' =>0
              ]);

              //dont change from number
              //send sms to guest
              Nexmo::message()->send([
                'to'   => auth()->user()->contact_no,
                'from' => '+639218518702',
                'text' => 'We have received your payment for the reservation to '.
                 $cottage->name . ' amounting of ' . $payment->amount_paid .' with a reference number of ' .$payment->ref_no. ' .'
            ]);

          });

        return redirect()->route('/')->with('success','Payment Has been Received!');
    }
}
