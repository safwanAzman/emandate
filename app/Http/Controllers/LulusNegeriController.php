<?php

namespace App\Http\Controllers;

use App\Models\MDT_PRNE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LulusNegeriController extends Controller
{
    public function index()
    {
        $state_user = session('authenticatedUser')['state_code'];
       // $lulusCount= MDT_PRNE::where('section','BLOCK2')->get();  

        $lulusJhr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '01')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusKdh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '02')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusKltn = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '03')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusMlk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '04')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusN9 = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '05')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusPhg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '06')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusPrk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '07')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusPrls = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '08')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusPP = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '09')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusSbh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '10')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusSrwk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '11')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusSlngr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->whereIN('BRANCHES.STATE_CODE', ['12', '16'])
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusTrg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '13')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();

        $lulusKl = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '14')
        ->where('section','BLOCK2')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.FILENAME')
        ->get();


        return view('pages.listlulusnegeri',
            compact('lulusJhr', 'lulusKdh', 'lulusKltn', 'lulusMlk',
                     'lulusN9', 'lulusPhg', 'lulusPrk', 'lulusPrls', 'lulusPP', 'lulusSbh',
                     'lulusSrwk', 'lulusSlngr', 'lulusTrg', 'lulusKl' )  );
    }

}
