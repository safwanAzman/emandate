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

        $searchlistenrp =  "%" . $this->searchlistenrp . "%";
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];
        

        if ($state_brn == 'HQ') {

            return view('livewire.search-enrp', [

                'file_ENRP' => DB::table('MDT_PRNE')
                    ->distinct()
                    ->select(DB::raw('filename, hcrdate'))
                    ->where('hcrdate', 'like', $searchlistenrp)
                    ->orderBy('filename', 'desc')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {
            return view('livewire.search-enrp', [

                'file_ENRP' => DB::table('MDT_PRNE')
                    ->distinct()
                    ->select(DB::raw('filename, hcrdate'))
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->where('hcrdate', 'like', $searchlistenrp)
                    //->groupBy('filename', 'hcrdate')
                    //->get()
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.search-enrp', [

                'file_ENRP' => DB::table('MDT_PRNE')
                    ->distinct()
                    ->select(DB::raw('filename, hcrdate'))
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->where('hcrdate', 'like', $searchlistenrp)
                    // ->groupBy('filename', 'hcrdate')
                    //->get()
                    ->paginate(10)

            ]);
        }
    }
}
