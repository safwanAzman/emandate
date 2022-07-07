<?php

namespace App\Http\Livewire;

use App\Models\MDT_PRNE;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptenrp extends Component
{

    use WithPagination;
    public $findrptenrp = '';
    public $idrptenrp;

    public function mount($id)
    {
        $this->idrptenrp = $id;
    }
 
    public function render()
    {
        $findrptenrp =  "%".$this->findrptenrp."%";

        $state_user = session('authenticatedUser')['state_code'];
        $state_brn = session('authenticatedUser')['branch_type'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];

        if ($state_brn == 'HQ' && $state_user == '00'){
            //dd($state_brn,$state_user);
            return view('livewire.rptenrp',[

                'rptdetails_enrp' => MDT_PRNE::where('hcrdate','=', $this->idrptenrp)
                                ->where('payrefnum','like', $findrptenrp)
                                ->where('approval','<>', '00')
                                ->paginate(10)

                
            ]); 
        }
        else{
            return view('livewire.rptenrp',[

                'rptdetails_enrp' => MDT_PRNE::where('hcrdate','=', $this->idrptenrp)
                                ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                                ->where('payrefnum','like', $findrptenrp)
                                ->where('approval','<>', '00')
                                ->paginate(10)
                    
            ]); 
        }
    
    }

}
