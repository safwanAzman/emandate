<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Mainrptresfail extends Component
{
    use WithPagination;
    public $findmainrptresfail = '';

    public function render()
    {
        $findmainrptresfail =  "%".$this->findmainrptresfail."%";
        //$state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];

        /* if ( $state_user == 00){ */
        if ( $branch_type == 'HQ'){    

            return view('livewire.mainrptresfail',[

            'rpt_resfail' => DB::table('MDT_SER')
                        ->select(DB::raw('filename, hdate, count(*) as bil'))
                        ->where('hdate', 'like', $findmainrptresfail)
                        ->where('status', 'not like' , '%00%')
                        ->groupBy('filename', 'hdate')
                        ->orderBy('filename')
                        ->get()           
            ]);
        }
        else{
            return view('livewire.mainrptresfail',[

                'rpt_resfail' => DB::table('MDT_SER')
                            ->select(DB::raw('filename, hdate, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $branch_user )
                            ->where('hdate', 'like', $findmainrptresfail)
                            ->where('status', 'not like' , '%00%')
                            ->groupBy('filename', 'hdate')
                            ->orderBy('filename')
                            ->get()           
                ]);
        } 

    }
}
