<?php


namespace App\service;


use App\BookingSheet;
use App\OffenseData;
use App\PhysicalDetails;
use App\Prisoner;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrisonerService
{

    public function create($request){

        DB::transaction(function ()use ($request){
//            $prisoner = Prisoner::create($request->all());
            $prisoner = new Prisoner($request->all());
            $prisoner->age = Carbon::parse($request->birthdate)->age;
            $prisoner->save();
            $prisoner->physicalDetails()->create($request->all());
            $prisoner->offenseData()->create($request->all());
            $prisoner->booking()->create($request->all());

            if(count(request()->name) > 0)
            {
                foreach(request()->name as $item=>$v){
                    $data2=array(
                        'prisoner_id'=>$prisoner->id,
                        'name'=>request()->name[$item],
                        'address'=>request()->address[$item],
                        'contact'=>request()->contact[$item],
                        'relationship'=>request()->relationship[$item],
                    );
                    \App\ContactPeople::insert($data2);
                }
            }
            if(count(request()->skills) > 0)
            {
                foreach(request()->skills as $item=>$v){
                    $data3=array(
                        'prisoner_id'=>$prisoner->id,
                        'skills'=>request()->skills[$item],

                    );
                    \App\Skills::insert($data3);
                }
            }
            if(count(request()->employeer_name) > 0)
            {
                foreach(request()->employeer_name as $item=>$v){
                    $data3=array(
                        'prisoner_id'=>$prisoner->id,
                        'occupation_work'=>request()->occupation[$item],
                        'employeer_name'=>request()->employeer_name[$item],
                        'date_employed'=>request()->date_employed[$item],
                    );
                    \App\WorkExperience::insert($data3);
                }
            }
        });

    }
}
