<?php

namespace App\Http\Livewire;

use App\Models\MDT_PRNE;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SearchEnrpDetails extends Component
{

    use WithPagination;

    public $listenrp = '';
    public $idenrp;

    public function mount($id)
    {
        $this->idenrp = $id;
    }

    public function render()
    {
        $listenrp =  "%" . $this->listenrp . "%";
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        if ($state_brn == 'HQ') {
            return view('livewire.search-enrp-details', [

                'filelist_ENRP' =>  MDT_PRNE::where(function ($query) use ($listenrp) {
                    $query->where('payrefnum', 'like', $listenrp)
                        ->orWhere('idnum', 'like', $listenrp);
                })
                    ->where('hcrdate', '=', $this->idenrp)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {

            return view('livewire.search-enrp-details', [

                'filelist_ENRP' => MDT_PRNE::where(function ($query) use ($listenrp) {
                    $query->where('payrefnum', 'like', $listenrp)
                        ->orWhere('idnum', 'like', $listenrp);
                })
                    ->where('hcrdate', '=', $this->idenrp) //->paginate(10)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'BRN' && $state_user != '00') {

            return view('livewire.search-enrp-details', [

                'filelist_ENRP' => MDT_PRNE::where(function ($query) use ($listenrp) {
                    $query->where('payrefnum', 'like', $listenrp)
                        ->orWhere('idnum', 'like', $listenrp);
                })
                    ->where('hcrdate', '=', $this->idenrp) //->paginate(10)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->paginate(10)

            ]);
        }
    }
}
