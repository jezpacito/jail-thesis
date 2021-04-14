<?php

namespace App\Http\Controllers;

use App\FingerPrint;
use App\JailGuard;
use Illuminate\Http\Request;

class JailGuardController extends Controller
{

    public function jailGuard_fingerPrint(){
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
        return view('guard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $guard = new JailGuard($request->all());
       $guard->creator_id = auth()->user()->id;
       $guard->save();

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
