<?php

namespace App\Http\Controllers;

//Carbon::now()->toDateString()
//ob_end_clean(); // this for solve error format excel
//ob_start(); // this for solve error format excel

use Illuminate\Http\Request;
use App\Exports\ResFailExport;
use App\Models\MDT_SER;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class RptRESfailController extends Controller
{
    public function index()
    {     
            return view('pages.reportresfail');
    }

    public function show($id)
    {
        
         return view('pages.reportresfail', compact('id'));

    }

    public function export(Request $request) 
    {
        $date = new DateTime();
        $date_download = $date->format('dmy');

        //return Excel::download(new ResFailExport($request->id), 'DataFailbyDate.xlsx');
        return Excel::download(new ResFailExport($request->id), 'DataFailbyDate_' . $date_download . '.xlsx');
    }

}
