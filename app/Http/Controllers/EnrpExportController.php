<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\EnrpExportExcel;
use App\Models\MDT_PRNE;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class EnrpExportController extends Controller
{   
    public function export(Request $request) 
    {
        $date = new DateTime();
        $date_download = $date->format('dmy');
        

        //return Excel::download(new ResPassExport($request->id), 'DataPassbyDate.xlsx');
        return Excel::download(new EnrpExportExcel($request->id), substr($request->id,0,8) . '.xlsx');
    }
}
