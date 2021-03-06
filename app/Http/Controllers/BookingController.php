<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use App\History;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;

class BookingController extends Controller
{

    public function booking_list_room(){
        $bookings =Booking::where('isFinished',false)
        ->where('cottage_id',null)
        ->get();
        return view('booking.index-room',compact('bookings'));
    }

    public function booking_list(){
        $bookings =Booking::where('isFinished',false)
        ->where('room_id',null)
        ->get();
        return view('booking.index',compact('bookings'));
    }

    public function history_room(){
        $histories = History::where('cottage_id',null)
        ->with('guest')
        ->get();

        return view('history.history-room',compact('histories'));
    }
    public function history(){
        $histories = History::where('room_id',null)
        ->get();

        return view('history.history',compact('histories'));
    }

    public function finished_booked_room(Booking $booking){
        DB::transaction(function () use($booking){
            $room = Room::findOrFail($booking->room_id);
            $room->update([
                'isVacant' =>true
            ]);
            $booking->update([
                'isFinished' =>true
            ]);
            History::create([
                'room_id' =>$room->id,
                'date_booked' =>$booking->booking_date,
                'user_id' =>$booking->guest_id,
                'booking_id' =>$booking->id
            ]);
        });
        return redirect()->back()->with('success','Session Finished!');


    }

    public function finished_booked(Booking $booking){

        if($booking->cottage->isNightAvailable ==false){
            $cottage = Cottage::findOrFail($booking->cottage->id);
            DB::transaction(function ()use ($cottage,$booking){
                $cottage->update([
                    'isNightAvailable' =>true,
                ]);
                $booking->update([
                    'isFinished' =>true
                ]);
                History::create([
                    'cottage_id' =>$cottage->id,
                    'date_booked' =>$booking->booking_date,
                    'guest_id' =>$booking->guest_id,
                    'booking_id' =>$booking->id
                ]);
            });

        }

        if($booking->cottage->isDayAvailable ==false){
            $cottage = Cottage::findOrFail($booking->cottage->id);
            DB::transaction(function () use ($cottage,$booking){
                $cottage->update([
                    'isDayAvailable' =>true
                ]);

                $booking->update([
                    'isFinished' =>true
                ]);
                History::create([
                    'cottage_id' =>$cottage->id,
                    'date_booked' =>$booking->booking_date,
                    'booking_id' =>$booking->id
                ]);
            });

        }

        return redirect()->back()->with('success','Session Finished!');
    }


}
