<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MDT_PRNE;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Dashenrp extends Component
{

    use WithPagination;

    public $listenrpall = '';
    public $idrenrpalls = '';
    public $idenrpall;

    public function updatingsearchTerm()
    {
        $this->resetPage();
    }
   
   public function mount($id)
   
    {
        $this->idenrpall = $id;
        //dd($this->idenrpall);
    }
   
    public function render()
    {

        $listenrpall =  "%".$this->listenrpall."%";
        $idrenrpalls = $this->idenrpall;
        //$idrenrpalls = "%".substr($this->idenrpall,0,2)."%";


        //return view('livewire.dashenrp');
        return view('livewire.dashenrp',[

            'filelist_ENRP' =>  MDT_PRNE:: where(function($query) use ($listenrpall){
                                $query->where('payrefnum', 'like', $listenrpall)
                                    ->orWhere('idnum', 'like', $listenrpall); })
                                ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)")  )
                                ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                                ->join('BNM_STATECODES', 'BNM_STATECODES.CODE', '=', 'BRANCHES.STATE_CODE')
                                ->where( 'BRANCHES.BRANCH_CODE' ,'=', $idrenrpalls  ) 
                                //->get()
                                ->paginate(10) 
        ]);  




    }
}
