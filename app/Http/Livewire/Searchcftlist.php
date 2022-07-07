<?php

namespace App\Http\Livewire;

use App\Models\MDT_TFC;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Searchcftlist extends Component
{
    use WithPagination;

    public $listcft = '';
    public $idenrp;

    public function mount($id)
    {
        $this->idenrp = $id;
    }

    public function render()
    {
    
        $listcft =  "%".$this->listcft."%";
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        //dd($state_user);

        if ($state_brn == 'HQ')
        { 
            return view('livewire.searchcftlist',[

              /*  'filelist_CFT' => MDT_TFC::where('filename','=', $this->idenrp)
                                            ->where('accno','like', $listcft)
                                            ->paginate(10) */

                'filelist_CFT' => MDT_TFC::where(function($query) use ($listcft) {
                                                $query->where('payrefno', 'like', $listcft)
                                                      ->orWhere('ic', 'like', $listcft); })
                                                ->where('filename','=', $this->idenrp)
                                                ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                                ->paginate(10)                       
                            
            ]);
        }
        
        elseif ($state_brn == 'STA' && $state_user != '00') {
            return view('livewire.searchcftlist',[

                'filelist_CFT' => MDT_TFC::where(function($query) use ($listcft) {
                                                $query->where('payrefno', 'like', $listcft)
                                                ->orWhere('ic', 'like', $listcft); })
                                                ->where('filename','=', $this->idenrp)
                                                ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                                ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                                ->paginate(10)
                    
            ]);

        }  


        elseif ($state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.searchcftlist',[

                'filelist_CFT' => MDT_TFC::where(function($query) use ($listcft) {
                                                $query->where('payrefno', 'like', $listcft)
                                                ->orWhere('ic', 'like', $listcft); })
                                                ->where('filename','=', $this->idenrp)
                                                ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                                ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
                                                ->paginate(10)
                    
            ]);

        }       


    }
}



