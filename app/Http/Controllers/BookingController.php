<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function booking_list(){
        $bookings =Booking::get();
        return view('booking.index',compact('bookings'));
    }
}
