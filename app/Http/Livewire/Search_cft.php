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
       //$state_user = session('authenticatedUser')['state_code'];
       $branch_user = session('authenticatedUser')['branch_code'];
       $branch_type = session('authenticatedUser')['branch_type'];

       /* if ( $state_user == 00){  */
        if ( $branch_type == 'HQ'){

            return view('livewire.searchcft',[
            
                'cftdata' => MDT_TFC::select('filename','hdate')
                            //->where('filename','like', $searchCFTTerm)
                            ->where('hdate','like', $searchCFTTerm)
                            ->groupBy('filename','hdate')->get()
            
            ]);
        }
        else{

            return view('livewire.searchcft',[
            
                'cftdata' => MDT_TFC::select('filename','hdate')
                            ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                            //->where('filename','like', $searchCFTTerm)
                            ->where('hdate','like', $searchCFTTerm)
                            ->groupBy('filename','hdate')
                            ->get()
            
            ]);
        }


    }
}



 