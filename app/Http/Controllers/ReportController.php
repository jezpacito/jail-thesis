<?php

namespace App\Http\Controllers;

use App\Booking;
use App\History;
use App\OffenseData;
use App\Prisoner;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Artisan;

class ReportController extends Controller
{
    public function normal_report_room(){


        $histories = History::where('cottage_id',null)->get();

        $pdf = PDF::loadView('reports.room_print', compact('histories'));
        return $pdf->stream('report.pdf');
    }

    public function normal_report(){

        $histories = History::where('room_id',null)->get();


        $pdf = PDF::loadView('reports.print_pdf', compact('histories'));
        return $pdf->stream('report.pdf');
    }
    public function select(){
        return view('reports.select');
    }
    //prisoner list report
    public function report(Request $request){

        if($request->has('month')){
            $month= Carbon::parse($request->month)->month;
            $year= Carbon::parse($request->month)->year;

            $histories = History::whereMonth('date_booked',$month)
                ->whereYear('date_booked',$year)
                ->get();

            $month_name= Carbon::parse($request->month)->monthName;
            Artisan::call('view:clear');
            $pdf = PDF::loadView('reports.print_pdf', compact('histories','month_name'));
            return $pdf->stream('report.pdf');
        }

//        else{
//            $year= Carbon::parse($request->year)->year;
//
//            $datas = OffenseData::with('prisoner')
//                ->whereYear('date_imprisonment',$year)
//                ->get();
//
//            $month_name= Carbon::parse($request->year)->monthName;
//            Artisan::call('view:clear');
//            $pdf = PDF::loadView('reports.print_pdf', compact('datas','month_name'));
//            return $pdf->stream('report.pdf');
//        }

    }

    public function report_logs(Request $request){

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
