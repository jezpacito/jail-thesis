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

Route::resource('prisoner','PrisonerController');

Route::resource('guard','JailGuardController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/staff', 'UserController@staff');

Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/view/staff/{staff}','UserController@show');

Route::put('/status/{staff}','UserController@update_status');

Route::put('/staff/update/{staff}','UserController@update');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/temp',function (){
return view('prisoner.insert');
});

Route::post('/contact-form',function (){
   dd(request()->all());
});

Route::get('rfid-test',function (){
   return view('prisoner.autosave');
});

Route::get('test',function (){
    return view('test');
});


Route::view('/table','tables');

Route::view('/staffs','staff.index');
