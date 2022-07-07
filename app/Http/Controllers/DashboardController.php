<?php

namespace App\Http\Controllers;

use App\Models\MDT_PRNE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard');
    }

 /*   public function dashboard_emandate()
    {   
        $daftarCount = MDT_PRNE::all();  //count daftar
        $lulusCount = MDT_PRNE::where('section','BLOCK2')->get();  //count lulus
        $gagalCount = MDT_PRNE::where('section','BLOCK1')->get();  //count gagal

        session('authenticatedUser')['state_code'];
        dd(session('authenticatedUser')['state_code']);

        return view('pages.dashboard_emandate',compact('daftarCount','lulusCount','gagalCount'));
        
    } */
    
    /* use if else */
    public function dashboard_emandate(Request $request)
    {

        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $state_name = session('authenticatedUser')['state_name'];
        
        if  ($state_brn == 'HQ')
        {

            $state = DB::table('MDT_PRNE')->select('section')->distinct()->get()->pluck('section');
            $branch = DB::table('MDT_PRNE')->select('payrefnum')->distinct()->get()->pluck('payrefnum');
            $transdate = DB::table('MDT_PRNE')->select('effdate')->distinct()->get()->pluck('effdate');

            $post = POST::query();

            if ($request->filled('section'))

            $daftarCount = MDT_PRNE::all();  //count daftar
            $lulusCount = MDT_PRNE::where('section','BLOCK2')->get();  //count lulus
            $gagalCount = MDT_PRNE::where('section','BLOCK1')->get();  //count gagal 

            return view('pages.dashboard_emandate',compact('daftarCount','lulusCount','gagalCount'));    
        }


        /* for all except HQ */
        else {
            $state_brn = session('authenticatedUser')['branch_type'];
            $state_user = session('authenticatedUser')['state_code'];

            //dd($state_user);
        
            $daftarCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_TYPE' , '=', $state_brn )
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->get();
            //dd($daftarCount);               

            $lulusCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_TYPE' , '=', $state_brn )
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->where('MDT_PRNE.SECTION', '=', 'BLOCK2' )
                            ->get();

            $gagalCount = DB::table('MDT_PRNE')
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_TYPE' , '=', $state_brn )
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            ->where('MDT_PRNE.SECTION', '=', 'BLOCK1' )
                            ->get();

            return view('pages.dashboard_emandate',compact('daftarCount','lulusCount','gagalCount'));  
        }

    }
    /* end if else */



    //testing sp
    // public function sp_info()
    // {   
    //     $procedureName = 'DBO.EMANDATE_INSERT_MDT_OFNI';
    //     $result = DB::executeProcedure($procedureName);
    //     dd($result);
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
