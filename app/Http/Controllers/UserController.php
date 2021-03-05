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

    public function update(User $staff){
        if($staff->status ==1){
            $staff->update(['status'=>0]);
        }
        else{
            $staff->update(['status'=>1]);

        }
        return redirect()->back()->with('success', 'Status Updated!');
    }

}
