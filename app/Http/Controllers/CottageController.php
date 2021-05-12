<?php

namespace App\Http\Controllers;

use App\Cottage;
use Illuminate\Http\Request;

class CottageController extends Controller
{
    public  function  night_status($id){
       $cottage = Cottage::findOrFail($id);
        $cottage->update([
            'isNightAvailable' =>false
        ]);

        return redirect()->back()->with('success','Updated!');
    }

    public  function  day_status($id){
        $cottage = Cottage::findOrFail($id);
        $cottage->update([
            'isDayAvailable' =>false
        ]);

        return redirect()->back()->with('success','Updated!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cottages = Cottage::where('category_id',1)->get();
        return view('cottage.index',compact('cottages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cottage = Cottage::create([
            'name' =>$request->cottage_name,
            'nightRate' =>$request->nightRate,
            'dayRate' =>$request->dayRate,
            'isVacant' =>true,
            'category_id' =>1,
            'isNightAvailable' =>true,
            'isDayAvailable' =>true
        ]);
        return redirect()->back()->with('success','Cottage added!');
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
       $cottage = Cottage::findOrFail($id);
       return view('cottage.cottage-update',compact('cottage'));
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
        $cottage = Cottage::findOrFail($id);
        $cottage->update($request->all());

        return redirect()->back()->with('success','Update Success');
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
