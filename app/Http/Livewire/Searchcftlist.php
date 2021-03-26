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
        $state_user = session('authenticatedUser')['state_code'];
        //dd($state_user);

        if ( $state_user == 00)
        { 
            return view('livewire.searchcftlist',[

              /*  'filelist_CFT' => MDT_TFC::where('filename','=', $this->idenrp)
                                            ->where('accno','like', $listcft)
                                            ->paginate(10) */

                'filelist_CFT' => MDT_TFC::where(function($query) use ($listcft) {
                                                $query->where('payrefno', 'like', $listcft)
                                                      ->orWhere('ic', 'like', $listcft); })
                                                ->where('filename','=', $this->idenrp)
                                                ->paginate(10)                       
                            
            ]);
        }
        else{
            return view('livewire.searchcftlist',[

                'filelist_CFT' => MDT_TFC::where(function($query) use ($listcft) {
                                                $query->where('payrefno', 'like', $listcft)
                                                ->orWhere('ic', 'like', $listcft); })
                                                ->where('filename','=', $this->idenrp)
                                                ->join ('ACCOUNT_MASTER', DB::raw("TRIM(ACCOUNT_MASTER.ACCOUNT_NO)"), '=', DB::raw("TRIM(MDT_TFC.PAYREFNO)")  )
                                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                                ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                                ->paginate(10)
                    
            ]);

        }       


    }
}



