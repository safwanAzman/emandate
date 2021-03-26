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
       //$state_user = session('authenticatedUser')['state_code'];
       $branch_user = session('authenticatedUser')['branch_code'];
       $branch_type = session('authenticatedUser')['branch_type'];

       /* if ( $state_user == 00){ */
       if ( $branch_type == 'HQ'){  

            return view('livewire.mainrptholdall',[

                'rpt_holdall' => DB::table('MDT_OFNI')
                            ->select(DB::raw('blockpayment_date, count(*) as bil'))
                            ->where('blockpayment_date', 'like', $findmainrptholdall)
                            ->groupBy('blockpayment_date')
                            ->orderBy('blockpayment_date')
                            ->get() 
                            
            ]);
        }
        else{
            return view('livewire.mainrptholdall',[

                'rpt_holdall' => DB::table('MDT_OFNI')
                            ->select(DB::raw('blockpayment_date, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_OFNI.FMS_ACCT_NO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $branch_user )
                            ->where('blockpayment_date', 'like', $findmainrptholdall)
                            ->groupBy('blockpayment_date')
                            ->orderBy('blockpayment_date')
                            ->get() 
                            
            ]);
        }        

    }

}
