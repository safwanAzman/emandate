<?php

namespace App\Http\Livewire;

use App\Models\MDT_TFC;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Search_cft extends Component
{

    use WithPagination;

    public $searchCFTTerm = '';

    public function render()
    {

       // $searchCFTTerm = ($this->searchCFTTerm != "") ? '' : '%'.$this->searchCFTTerm.'%';
       $searchCFTTerm =  "%".$this->searchCFTTerm."%";
       $state_brn = session('authenticatedUser')['branch_type'];
       $state_user = session('authenticatedUser')['state_code'];
       $branch_user = session('authenticatedUser')['branch_code'];
       $branch_type = session('authenticatedUser')['branch_type'];
       //$user_level = session('authenticatedUser')['access_user'];

        if ($state_brn == 'HQ') {

            return view('livewire.searchcft',[
            
                'cftdata' => MDT_TFC::select('filename','hdate')
                            ->distinct()
                            //->where('filename','like', $searchCFTTerm)
                            ->where('hdate','like', $searchCFTTerm)
                            //->groupBy('filename','hdate')
                            ->orderBy('filename','desc')
                            //->get()
                            ->paginate(10)
            
            ]);
        }

        elseif ($state_brn == 'STA' && $state_user != '00') {

            return view('livewire.searchcft',[
            
                'cftdata' => MDT_TFC::select('filename','hdate')
                            ->distinct()
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                            //->where('filename','like', $searchCFTTerm)
                            ->where('hdate','like', $searchCFTTerm)
                            ->orderBy('filename','desc')
                            //->groupBy('filename','hdate')
                            //->get()
                            ->paginate(10)
            
            ]);
        }

        elseif ($state_brn == 'BRN' && $state_user != '00') {

            return view('livewire.searchcft',[
            
                'cftdata' => MDT_TFC::select('filename','hdate')
                            ->distinct()
                            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                            //->where('filename','like', $searchCFTTerm)
                            ->where('hdate','like', $searchCFTTerm)
                            ->orderBy('filename','desc')
                            //->groupBy('filename','hdate')
                            //->get()
                            ->paginate(10)
            
            ]);
        }


    }
}



 