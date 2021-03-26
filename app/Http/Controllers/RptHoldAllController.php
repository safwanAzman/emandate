<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\HoldallExport;
use App\Models\MDT_OFNI;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;


class RptHoldAllController extends Controller
{
    public function index()
    {     
            return view('pages.reportholdall');
    }

    public function show($id)
    {
        
         return view('pages.reportholdall', compact('id'));

    }

    public function export(Request $request) 
    {
        $date = new DateTime();
        $date_download = $date->format('dmy');

        //return Excel::download(new HoldallExport($request->id), 'DataSekatan.xlsx');
        return Excel::download(new HoldallExport($request->id), 'DataSekatan_' . $date_download . '.xlsx');

    } 

}
