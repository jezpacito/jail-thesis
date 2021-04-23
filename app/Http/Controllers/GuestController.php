<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function guest(){

     return view('auth.register');
    }

    public function register(){
        $user = User::create(request()->all());
        $user->update(['status'=>true]);
        $user->assignRole('guest');
        Auth::login($user);
        return redirect()->route('/');
    }
}
