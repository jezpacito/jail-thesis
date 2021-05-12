<?php

use App\Cottage;
use App\Room;
use Illuminate\Support\Facades\Route;
use Nexmo\Laravel\Facade\Nexmo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::view('/stepss','step-test');

Route::get('/test-sms',function(){
    Nexmo::message()->send([
        'to'   => '+639218518702',
        'from' => '+639218518702',
        'text' => 'TEST message.'
    ]);
    return 'sent';
});
Route::get('/', function () {
    $cottages = Cottage::where('isNightAvailable',true)
    ->orWhere('isDayAvailable',true)
    ->latest()->get();
    $rooms  = Room::where('isVacant',true)->get();
    return view('homepage.home',compact('cottages','rooms'));
})->name('/');

Route::get('registration/guest','GuestController@guest');
Route::post('/register/guest','GuestController@register')->name('register.guest');
Route::get('/generate/report','ReportController@normal_report');
//cottage routes
Route::resource('/cottage','CottageController');

Route::get('/cottage/night/{id}','CottageController@night_status');

Route::get('/cottage/day/{id}','CottageController@day_status');

Route::resource('/rooms','RoomController');
Route::get('room/list','CottageController@index_room');

\Illuminate\Support\Facades\Auth::routes();

Route::middleware('auth')->group(function () {
//book room
    Route::get('/book/{room}','RoomController@book_room');

    //payment method
    Route::get('checkout/{id}','CheckoutController@checkout')->name('checkout');
    Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');
    //end payment

    //booking cottage
    Route::get('/bookings','BookingController@booking_list');
    Route::get('/bookings/room','BookingController@booking_list_room');


    Route::get('/finished/{booking}','BookingController@finished_booked');
    Route::get('/finished/room/{booking}','BookingController@finished_booked_room');
    Route::get('/history','BookingController@history');
    Route::get('/history/room','BookingController@history_room');
    // Route::post('/booking','BookingController@book')->name('booking');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/staff', 'UserController@staff');

    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/view/staff/{staff}','UserController@show');

    Route::put('/status/{staff}','UserController@update_status');


    Route::put('/staff/update/{staff}','UserController@update');


    Route::prefix('report')->group(function () {
        Route::get('/monthly/report','ReportController@monthly');
        Route::post('/generate','ReportController@report');

        Route::get('/quarterly/report','ReportController@quarterly');
        Route::get('/yearly/report','ReportController@yearly');
        Route::get('/select','ReportController@select');

    });
    Route::get('/about', function () {
        return view('about');
    })->name('about');


    Route::get('/temp',function (){
        return view('prisoner.insert');
    });


    //vue route
    Route::get('/logs',function(){
        return view('prisoner.logs');
    });
    Route::get('/fingerprint',function(){
        return view('guard.logs');
    });

    //rfid tap
    Route::post('/contact-form','LogsController@attendance');


    Route::get('test',function (){
        return view('test');
    });


    Route::view('/table','tables');

    Route::view('/staffs','staff.index');


    });
