<?php

namespace App\Http\Livewire;

use App\Models\MDT_PRNE;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $message = 'a';
    
    public function loading()
    {
        
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        //$state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];
        
       /*  if ( $state_user == 00){ */
        if ( $branch_type == 'HQ'){

            return view('livewire.search',[
               /* 'MDT_PRNE' => MDT_PRNE::where('idnum','like', $searchTerm)
                                ->orwhere('payrefnum','like', $searchTerm)
                                ->paginate(10) */

                'MDT_PRNE' =>  MDT_PRNE::where(function($query) use ($searchTerm) {
                                    $query->where('payrefnum', 'like', $searchTerm)
                                          ->orWhere('idnum', 'like', $searchTerm); })
                                         ->paginate(10) 
            ]);
        }
        else{
            
            return view('livewire.search',[
              /*  'MDT_PRNE' => MDT_PRNE::where('payrefnum','like', $searchTerm)
                                ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                //->orwhere('payrefnum','like', $searchTerm)
                                ->paginate(10) */

                    'MDT_PRNE' => MDT_PRNE:: where(function($query) use ($searchTerm){
                                    $query->where('payrefnum', 'like', $searchTerm)
                                          ->orWhere('idnum', 'like', $searchTerm); })
                                    ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                    ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                    ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                                    ->paginate(10) 
                                
            ]);
        }        

    }
}