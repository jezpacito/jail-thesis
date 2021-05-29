<?php

namespace App\Http\Controllers;

use App\Cottage;
use Illuminate\Http\Request;

class CottageController extends Controller
{
    public  function  night_status($id){
       $cottage = Cottage::find($id);

       if($cottage->isNightAvailable ==true){
           $cottage->update([
               'isNightAvailable' =>false
           ]);
       }else{
           $cottage->update([
               'isNightAvailable' =>true
           ]);
       }


        return redirect()->back()->with('success','Updated!');
    }

    public  function  day_status($id){
        $cottage = Cottage::findOrFail($id);

        if($cottage->isDayAvailable ==true){
            $cottage->update([
                'isDayAvailable' =>false
            ]);
        }else{
            $cottage->update([
                'isDayAvailable' =>true
            ]);
        }


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

        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        $cottage = Cottage::create([
            'name' =>$request->cottage_name,
            'nightRate' =>$request->nightRate,
            'dayRate' =>$request->dayRate,
            'isVacant' =>true,
            'category_id' =>1,
            'isNightAvailable' =>true,
            'isDayAvailable' =>true,
            'file_name' => time().'_'.$request->file->getClientOriginalName(),
            'file_path' => '/storage/' . $filePath
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
       $cottage = Cottage::find($id);
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


        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        $cot = Cottage::where('id',$id)->first();

        $cot->update($request->all());
        if($request->has('file')){
            $cot->update([
                'file_path' => $filePath,
                'file_name' => $fileName
            ]);
        }


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
