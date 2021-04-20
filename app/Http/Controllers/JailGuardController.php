<?php

namespace App\Http\Controllers;

use App\FingerPrint;
use App\JailGuard;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JailGuardController extends Controller
{

    public function update_status(JailGuard $guard){

        if($guard->isDischarge ==true){
            $guard->update(['isDischarge'=>false]);
        }
        else{
            $guard->update(['isDischarge'=>true]);

        }
        return redirect()->back()->with('success', 'Status Updated!');
    }

    public function jailGuard_fingerPrint(){
        $finger_print = new JailGuard();
        $finger_print->fingerprint_id = request()->fingerprint_id;
        $finger_print->save();

        $finger_print->update([
            'add_fingerid' => $finger_print->id
        ]);
        return redirect()->back()->with('sucess','finger print number addded');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guards = JailGuard::latest()->paginate(10);
        return view('guard.index',compact('guards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fingerprint = JailGuard::where('firstname',null)
        ->where('lastname',null)->first();

  
        return view('guard.create',compact('fingerprint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $guard = JailGuard::findOrfail($request->jailguard_id);
        $guard->update([
            'firstname' =>$request->firstname,
            'lastname' =>$request->lastname,
            'middlename' =>$request->middlename,
            'contact_no' =>$request->contact_no,
            'address' =>$request->address,
            'creator_id' =>auth()->user()->id,
            // 'finger_print',
        ]);
     

       return redirect()->route('guard.index')->withSuccess('Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guard = JailGuard::findOrFail($id);
        return view('guard.update',compact('guard'));
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
        $guard = JailGuard::findOrFail($id);
        $guard->update($request->all());
        return redirect()->back()->with('success','Jail Guard Updated!');
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
