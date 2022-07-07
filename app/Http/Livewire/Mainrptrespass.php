<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Mainrptrespass extends Component
{
    use WithPagination;
    public $findmainrptrespass = '';

    public function render()
    {
        $findmainrptrespass =  "%".$this->findmainrptrespass."%";
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        /* if ( $state_user == 00){ */
            if ($state_brn == 'HQ'){  

            return view('livewire.mainrptrespass',[

            'rpt_respass' => DB::table('MDT_SER')
                        ->select(DB::raw('filename, hdate, count(*) as bil'))
                        ->where('hdate', 'like', $findmainrptrespass)
                        ->where('status', 'like' , '%00%')
                        ->groupBy('filename', 'hdate')
                        ->orderBy('filename')
                        ->get() 
                        ]);
        }

        elseif ( $state_brn == 'STA' && $state_user != '00') {
            return view('livewire.mainrptrespass',[

                'rpt_respass' => DB::table('MDT_SER')
                            ->select(DB::raw('filename, hdate, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=', $state_user )
                            ->where('hdate', 'like', $findmainrptrespass)
                            ->where('status', 'like' , '%00%')
                            ->groupBy('filename', 'hdate')
                            ->orderBy('filename')
                            ->get() 
                            
                ]);
        }  

        elseif ( $state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.mainrptrespass',[

                'rpt_respass' => DB::table('MDT_SER')
                            ->select(DB::raw('filename, hdate, count(*) as bil'))
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                            ->where('hdate', 'like', $findmainrptrespass)
                            ->where('status', 'like' , '%00%')
                            ->groupBy('filename', 'hdate')
                            ->orderBy('filename')
                            ->get() 
                            
                ]);
        }    

    }
}