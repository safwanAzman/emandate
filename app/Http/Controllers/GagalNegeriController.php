<?php

namespace App\Http\Controllers;

use App\Models\MDT_PRNE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GagalNegeriController extends Controller
{
    public function index()
    {
        $state_user = session('authenticatedUser')['state_code'];
       // $gagalCount= MDT_PRNE::where('section','BLOCK2')->get();  

        $gagalJhr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '01')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalKdh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '02')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalKltn = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '03')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalMlk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '04')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalN9 = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '05')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalPhg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '06')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalPrk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '07')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalPrls = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '08')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalPP = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '09')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalSbh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '10')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalSrwk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '11')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalSlngr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->whereIN('BRANCHES.STATE_CODE', ['12', '16'])
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalTrg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '13')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $gagalKl = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '14')
        ->where('section','BLOCK1')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();


        return view('pages.listgagalnegeri',
            compact('gagalJhr', 'gagalKdh', 'gagalKltn', 'gagalMlk',
                    'gagalN9', 'gagalPhg', 'gagalPrk', 'gagalPrls', 'gagalPP', 'gagalSbh',
                    'gagalSrwk', 'gagalSlngr', 'gagalTrg', 'gagalKl' )  );
    }

}
