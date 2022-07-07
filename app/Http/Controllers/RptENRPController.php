<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\EnrpExport;
use App\Models\MDT_PRNE;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class RptENRPController extends Controller
{
    public $mdt_hcrdate;

    public function index()
    {    
            //$rpt_enrp = MDT_PRNE::where('Approval','00')->paginate(10);   
            return view('pages.reportenrp');
    }


    public function show($id)
    {
        //dd($id);

        //$test = MDT_PRNE::where($id);
        //$test =MDT_PRNE::where('hcrdate','like','%'.$id.'%') ->where('approval','=','%00%');
        //dd($test);

        $mdt_enrp =  MDT_PRNE::where('hcrdate','=',$id)->where('Approval','00');
        $rpt_enrp = MDT_PRNE::where('hcrdate','=',$id)
        ->where('approval','not like','%00%')->paginate(10);

        $this->mdt_hcrdate = $mdt_enrp->hcrdate;
        

        return view('pages.reportenrp', compact('id'));
    }
    
    public function export(Request $request) 
    {   
        $date = new DateTime();
        $date_download = $date->format('dmy');

        //return Excel::download(new EnrpExport($request->id), 'EnrpData.xlsx');
        return Excel::download(new EnrpExport($request->id), 'EnrpData_' . $this->mdt_hcrdate . '.xlsx');
    }
   
}
