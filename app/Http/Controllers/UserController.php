<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function staff(){
        $users = \App\User::role('staff')->get();

        return view('staff.index',compact('users'));
    }

    public function show(User $staff){
       return view('staff.view',compact('staff'));
    }

    public function update(){

    }

}
