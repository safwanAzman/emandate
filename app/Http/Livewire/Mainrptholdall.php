<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MDT_OFNI;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Mainrptholdall extends Component
{
    use WithPagination;
    public $findmainrptholdall = '';
    
    public function render()
    {

        $findmainrptholdall =  "%".$this->findmainrptholdall."%";
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

       /* if ( $state_user == 00){ */
        if ( $state_brn == 'HQ'){  

            return view('livewire.mainrptholdall',[

                'rpt_holdall' => DB::table('MDT_OFNI')
                            ->select(DB::raw('blockpayment_date, count(*) as bil'))
                            ->where('blockpayment_date', 'like', $findmainrptholdall)
                            ->groupBy('blockpayment_date')
                            ->orderBy('blockpayment_date')
                            ->get() 
                            
            ]);
        }

        elseif ( $state_brn == 'STA' && $state_user != '00') {
            return view('livewire.mainrptholdall',[

                'rpt_holdall' => DB::table('MDT_OFNI')
                            ->select(DB::raw('blockpayment_date, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_OFNI.FMS_ACCT_NO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',   DB::raw($state_user) )
                            ->where('blockpayment_date', 'like', $findmainrptholdall)
                            ->groupBy('blockpayment_date')
                            ->orderBy('blockpayment_date')
                            ->get() 
                            
            ]);
        }

        elseif ( $state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.mainrptholdall',[

                'rpt_holdall' => DB::table('MDT_OFNI')
                            ->select(DB::raw('blockpayment_date, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_OFNI.FMS_ACCT_NO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                            ->where('blockpayment_date', 'like', $findmainrptholdall)
                            ->groupBy('blockpayment_date')
                            ->orderBy('blockpayment_date')
                            ->get() 
                            
            ]);
        }        

    }

}