<?php

namespace App\Http\Controllers;

use App\OffenseData;
use App\Prisoner;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Artisan;

class ReportController extends Controller
{
    public function select(){
        return view('reports.select');
    }
    public function report(Request $request){

        if($request->has('month')){
            $month= Carbon::parse($request->month)->month;
            $year= Carbon::parse($request->month)->year;

            $datas = OffenseData::with('prisoner')
                ->whereMonth('date_imprisonment',$month)
                ->whereYear('date_imprisonment',$year)
                ->get();

            $month_name= Carbon::parse($request->month)->monthName;
            Artisan::call('view:clear');
            $pdf = PDF::loadView('reports.print_pdf', compact('datas','month_name'));
            return $pdf->stream('report.pdf');
        }else{
            $year= Carbon::parse($request->year)->year;

            $datas = OffenseData::with('prisoner')
                ->whereYear('date_imprisonment',$year)
                ->get();

            $month_name= Carbon::parse($request->year)->monthName;
            Artisan::call('view:clear');
            $pdf = PDF::loadView('reports.print_pdf', compact('datas','month_name'));
            return $pdf->stream('report.pdf');
        }

    }

}