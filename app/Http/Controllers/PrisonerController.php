<?php

namespace App\Http\Controllers;

use App\BookingSheet;
use App\Http\Requests\PrisonerFormRequest;
use App\OffenseData;
use App\PhysicalDetails;
use App\Prisoner;
use App\service\PrisonerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrisonerController extends Controller
{

    public function update_jail_booking_and_offense_data(Prisoner $prisoner){
        $prisoner->booking->update(request()->all());
        $prisoner->offenseData->update(request()->all());
        return redirect()->back()->with('success','Update Success!');
    }
    public function edit_jail_booking_and_offense_data(Prisoner $prisoner){
        return view('prisoner.jail_booking_offense_update',compact('prisoner'));
    }
    public function update_prisoner_personal_data(Prisoner $prisoner){
        DB::transaction(function ()use ($prisoner){
            $prisoner->update(request()->all());
            $prisoner->physicalDetails->update(request()->all());
        });

        return redirect()->back()->with('success','Personal Data Updated');
    }

    public function edit_prisoner_personal_data(Prisoner $prisoner){
        $prisoner = Prisoner::with(['contacts','physicalDetails','offenseData','booking'])
            ->where('id',$prisoner->id)
            ->first();


        return view('prisoner.prisoner_personal_data_update',compact('prisoner'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prisoners = Prisoner::latest()->paginate(10);
        return view('prisoner.index',compact('prisoners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prisoner.personal-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrisonerFormRequest $request)
    {
        (new PrisonerService())->create($request);
        return redirect()->route('prisoner.index')->withSuccess('Added prisoner successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prisoner = Prisoner::with(['contacts','physicalDetails','offenseData','booking'])
            ->where('id',$id)
            ->first();

        return view('prisoner.show',compact('prisoner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
