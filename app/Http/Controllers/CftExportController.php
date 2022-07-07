<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\CftExportExcel;
use App\Models\MDT_TFC;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class CftExportController extends Controller
{
    public function export(Request $request) 
    {
        $date = new DateTime();
        $date_download = $date->format('dmy');

        //return Excel::download(new ResPassExport($request->id), 'DataPassbyDate.xlsx');
        return Excel::download(new CftExportExcel($request->id), substr($request->id,0,12) . '.xlsx');
    }
}
