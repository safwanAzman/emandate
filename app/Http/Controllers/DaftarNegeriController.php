<?php

namespace App\Http\Controllers;

use App\Models\MDT_PRNE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarNegeriController extends Controller
{
    public function index()
    {
        $state_user = session('authenticatedUser')['state_code'];
    
        $daftarAll = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarJhr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '01')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarKdh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '02')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarKltn = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '03')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarMlk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '04')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarN9 = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '05')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarPhg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '06')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarPrk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '07')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarPrls = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '08')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarPP = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '09')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarSbh = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '10')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarSrwk = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '11')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarSlngr = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->whereIN('BRANCHES.STATE_CODE', ['12', '16'])
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarTrg = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '13')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();

        $daftarKl = DB::table('MDT_PRNE')
        ->select(DB::raw('MDT_PRNE.PAYREFNUM, count(*) as bil'))
        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
        ->join ('BRANCHES', DB::raw("SUBSTR(ACCOUNT_MASTER.BRANCH_CODE,1,2)"), '=', 'BRANCHES.STATE_CODE')
        ->where('BRANCHES.STATE_CODE' , '=',  '14')
        ->groupBy('MDT_PRNE.PAYREFNUM', 'MDT_PRNE.SECTION')
        ->get();


        return view('pages.listdaftarnegeri',
            compact( 'daftarAll','daftarJhr', 'daftarKdh', 'daftarKltn', 'daftarMlk',
                    'daftarN9', 'daftarPhg', 'daftarPrk', 'daftarPrls', 'daftarPP', 'daftarSbh',
                    'daftarSrwk', 'daftarSlngr', 'daftarTrg', 'daftarKl' )  );
    }


}
