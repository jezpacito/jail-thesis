<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function book(Request $request){      
        $time = Carbon::parse($request->booking)->toTimeString();
        $date = Carbon::parse($request->booking)->toDateString();
        $time_type = date('A', strtotime($request->booking));

        DB::transaction(function () use ($time,$request,$time_type,$date){
            $booking = Booking::create([
                'number_persion' =>$request->number_persion,
                'booking_date' =>$date,
                'booking_time' =>$time,
                'guest_id' =>auth()->user()->id,
                'time_type' =>$time_type,
                'cottage_id' =>request()->cottage_id
            ]);
            $cottage = Cottage::find($request->cottage_id);
            if($time_type == "AM" && $booking->cottage->isDayAvailable ==true){
              
                dd($cottage->update(['isDayAvailable' =>false]));
                $booking->cottage->update([
                    'isDayAvailable' =>false
                ]);
            }if($time_type == "PM" && $booking->cottage->isNightAvailable ==true){
                dd($cottage->update(['isNightAvailable' =>false]));
                $booking->cottage->update([
                    'isNightAvailable' =>false
                ]);
            }
        });
      

        return redirect()->route('checkout');


    }
}
