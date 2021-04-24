<?php

use App\Cottage;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    $cottages = Cottage::where('isNightAvailable',true)
    ->orWhere('isDayAvailable',true)
    ->latest()->get();
    return view('homepage.home',compact('cottages'));
})->name('/');

Route::get('registration/guest','GuestController@guest');
Route::post('/register/guest','GuestController@register')->name('register.guest');



\Illuminate\Support\Facades\Auth::routes();

Route::middleware('auth')->group(function () {
    //payment method
    Route::get('checkout/{cottage}','CheckoutController@checkout')->name('checkout');
    Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');
    //end payment

    Route::post('/booking','BookingController@book')->name('booking');

    Route::resource('prisoner','PrisonerController');

    Route::resource('guard','JailGuardController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/staff', 'UserController@staff');

    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/view/staff/{staff}','UserController@show');

    Route::put('/status/{staff}','UserController@update_status');

    //update jail guard status
    Route::put('/status/guard/{guard}','JailGuardController@update_status');

    Route::put('/staff/update/{staff}','UserController@update');


    Route::prefix('prisoner')->group(function () {
        Route::get('/{prisoner}/physical_details','PrisonerController@edit_prisoner_personal_data');

        Route::put('/{prisoner}/physical_details','PrisonerController@update_prisoner_personal_data');

        Route::get('/{prisoner}/jailBookingOffense','PrisonerController@edit_jail_booking_and_offense_data');

        Route::put('/{prisoner}/jailBookingOffense','PrisonerController@update_jail_booking_and_offense_data');

        Route::get('/{prisoner}/physicalDefense','PrisonerController@edit_physical_defense');

        Route::put('/{prisoner}/physicalDefense','PrisonerController@update_physical_defense');

    });

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
    
    //add finger print number
    Route::post('/add/fingerprint','JailGuardController@jailGuard_fingerPrint')->name('add.fingerprint');

    //vue route
    Route::get('/logs',function(){
        return view('prisoner.logs');
    });
    Route::get('/fingerprint',function(){
        return view('guard.logs');
    });

    //rfid tap
    Route::post('/contact-form','LogsController@attendance');
    Route::get('rfid-test', function (){
        return view('prisoner.autosave');
    });

    Route::get('test',function (){
        return view('test');
    });


    Route::view('/table','tables');

    Route::view('/staffs','staff.index');


    });
