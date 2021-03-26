<?php

namespace App\Http\Controllers;
use App\Exports\KodRujukan;
use Illuminate\Http\Request;
use App\Models\MDT_OFNI_DESC;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class RujukanKodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         return view('RujukanKod');
    }

    public function export()
    {
        $date = new DateTime();
        $date_download = $date->format('dmy');

        //return Excel::download(new KodRujukan, 'KodRujukan.xlsx');
        return Excel::download(new KodRujukan, 'KodRujukan_' . $date_download . '.xlsx');

    }
}