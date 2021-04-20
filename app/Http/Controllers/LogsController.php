<?php

namespace App\Http\Controllers;

use App\FingerPrint;
use App\Http\Resources\FingerPrintResource;
use App\Logs;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\LogsResource;
use App\JailGuard;
use App\Prisoner;

class LogsController extends Controller
{


    public function logs(){
      $logs =  Logs::latest()->get() ;
        return response()->json(
            LogsResource::collection($logs)
        );
    }

    //list of fingerprint logs
    public function logs_fingerprint(){
        dd('test');
        $logs_p =  FingerPrint::latest()->get() ;
          return response()->json(
              FingerPrintResource::collection($logs_p)
          );
      }

    //register finger print logs through api
    public function fingerprint_in($fingerprint){
        $guard = JailGuard::where('fingerprint_id',$fingerprint)->first();
        if($guard ===null){
           JailGuard::create([
               'fingerprint_id' =>$fingerprint
           ]);
        }else{
            $logs_jail= FingerPrint::create([
                'jail_guard_id' =>$guard->id,
                'finger_print_uuid' =>$fingerprint
            ]);
    
        }
        
     
        return  $logs_jail;
    }

    
    //time in and out of prisoners using rfid
    public function attendance(Request $req){

        $prisoner= Prisoner::where('rfid_uuid',$req->card_id)->first();
       if($prisoner ==null){
           return response()->json(
               'that rfid card does not exist!'
           );
       }
       if(count($prisoner->logs) <=0){
           //first pag wala pa syay attendance create one
       return  Logs::create([
            'prisoner_id' =>$prisoner->id,
            'time_in' =>Carbon::now()
         ]);
        }


       $logs = Logs::where('prisoner_id',$prisoner->id)
           ->get();

       //after time_in, time out na

        if($prisoner->logs->first()->time_out ==null){
            return $prisoner->logs->first()->update(['time_out' =>Carbon::now()]);
        }
        foreach ($logs->reverse() as $log){

            if($log->time_in !=null && $log->time_out !=null){
                return  Logs::create([
                    'prisoner_id' =>$prisoner->id,
                    'time_in' =>Carbon::now()
                ]);
            }
            if($log->time_in !=null && $log->time_out ==null){
              return  $log->update(['time_out' =>Carbon::now()]);
            }
        }
    }
}
