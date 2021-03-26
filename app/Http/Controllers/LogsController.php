<?php

namespace App\Http\Controllers;

use App\Logs;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function attendance(Request $req){

        $user= User::where('rfid_uuid',$req->card_id)->first();
       if($user ==null){
           return response()->json(
               'that rfid card does not exist!'
           );
       }
       if(count($user->logs) <=0){
           //first pag wala pa syay attendance create one
       return  Logs::create([
            'user_id' =>$user->id,
            'time_in' =>Carbon::now()
         ]);
        }


       $logs = Logs::where('user_id',$user->id)
           ->get();

       //after time_in, time out na

        if($user->logs->first()->time_out ==null){
            return $user->logs->first()->update(['time_out' =>Carbon::now()]);
        }
        foreach ($logs->reverse() as $log){

            if($log->time_in !=null && $log->time_out !=null){
                return  Logs::create([
                    'user_id' =>$user->id,
                    'time_in' =>Carbon::now()
                ]);
            }
            if($log->time_in !=null && $log->time_out ==null){
              return  $log->update(['time_out' =>Carbon::now()]);
            }
        }


    }
}
