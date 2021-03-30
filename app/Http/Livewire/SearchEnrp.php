<?php

namespace App\Http\Livewire;

use App\Models\MDT_PRNE;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SearchEnrp extends Component
{

    use WithPagination;

    public $searchlistenrp = '';

    public function render()
    {

        $searchlistenrp =  "%".$this->searchlistenrp."%";
        //$state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];


       /*  if ( $state_user == 00){ */
        if ( $branch_type == 'HQ'){

            return view('livewire.search-enrp',[

                'file_ENRP' => DB::table('MDT_PRNE')
                        ->select(DB::raw('filename, hcrdate, count(*) as bil'))
                        ->where('hcrdate', 'like', $searchlistenrp)
                        ->groupBy('filename', 'hcrdate')
                        ->get(),

                
            ]);
        }
        else{
            return view('livewire.search-enrp',[
                'file_ENRP' => DB::table('MDT_PRNE')
                        ->select(DB::raw('filename, hcrdate, count(*) as bil'))
                        ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                        ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                        ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                        ->where('hcrdate', 'like', $searchlistenrp)
                        ->groupBy('filename', 'hcrdate')
                        ->get(),
            ]);
        }


    }
}

