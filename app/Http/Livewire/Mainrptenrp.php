<?php

namespace App\Http\Livewire;

use App\Models\MDT_PRNE;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use DateTime;

class Mainrptenrp extends Component
{

    use WithPagination;
    public $findmainrptenrp = '';

    public function render()
    {
        $findmainrptenrp =  "%".$this->findmainrptenrp."%";
        //$state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];

        $date = new DateTime();
        $date->format('Y-m-d');

        if ( $branch_type == 'HQ'){

            return view('livewire.mainrptenrp',[

            'rpt_enrp' => DB::table('MDT_PRNE')
                        ->select(DB::raw('hcrdate, count(*) as bil'))
                        ->where('hcrdate', 'like', $findmainrptenrp)
                        ->where('approval', 'not like' , '%00%')
                        ->groupBy('hcrdate')
                        ->orderBy('hcrdate')
                        ->get() 
                        
            ]);
            //dd($this->rpt_enrp);
        }
        else {
            
            return view('livewire.mainrptenrp',[

                'rpt_enrp' => DB::table('MDT_PRNE')
                            ->select(DB::raw('hcrdate, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                            ->where('hcrdate', 'like', $findmainrptenrp)
                            ->where('approval', 'not like' , '%00%')
                            ->groupBy('hcrdate')
                            ->orderBy('hcrdate')
                            ->get() 
                            
                ]);

        }    

    }
}
