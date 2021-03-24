<?php

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
Route::view('/stepss','step-test');


Route::get('/', function () {
    return view('auth.login');
});

\Illuminate\Support\Facades\Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('prisoner','PrisonerController');

    Route::resource('guard','JailGuardController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/staff', 'UserController@staff');

    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/view/staff/{staff}','UserController@show');

    Route::put('/status/{staff}','UserController@update_status');

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


    Route::get('prisoner/logs/timein',function (){
        $attendances = \App\Attendance::with('prisoner')->get();
        return view('logs.prisoner-logs',compact('attendances'));
    });
    Route::post('/contact-form',function () {
//        dd(request()->all());

        $prisoner = \App\Prisoner::where('rfid_uuid',request()->card_id)->first();
        $attendance = \App\Attendance::where('rfid_uuid',request()->card_id)->first();


        if($prisoner->attendaces ==null){
            $attendance = \App\Attendance::create([
                'prisoner_id' =>$prisoner->id,
                'rfid_uuid' =>request()->card_id,
                'dateTime_in' =>\Carbon\Carbon::now(),
            ]);
            return $attendance;
        }
            if($attendance->dateTime_in !=null){
            $at = \App\Attendance::findOrFail($attendance->id);
            $at->update(['dateTime_out' =>\Carbon\Carbon::now()

            ]);
                return $at;


            }


    });

    Route::get('rfid-test',function (){
        return view('prisoner.autosave');
    });

    Route::get('test',function (){
        return view('test');
    });


    Route::view('/table','tables');

    Route::view('/staffs','staff.index');


    });
