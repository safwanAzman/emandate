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

    public function updatingsearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        $branch_type = session('authenticatedUser')['branch_type'];



        if ($state_brn == 'HQ') {

            return view('livewire.search', [

                'MDT_PRNE' =>  MDT_PRNE::select(DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS CAWANGAN,MDT_PRNE.PAYREFNUM,MDT_PRNE.IDNUM,MDT_PRNE.BUYERNAME,MDT_PRNE.APPROVAL_DESC'))
                    ->where(function ($query) use ($searchTerm) {
                    $query->where('payrefnum', 'like', $searchTerm)
                        ->orWhere('idnum', 'like', $searchTerm);
                })
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->orderBy('ACCOUNT_MASTER.BRANCH_CODE', 'asc')
                    ->paginate(10)
            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {


            return view('livewire.search', [

                'MDT_PRNE' => MDT_PRNE::select(DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS CAWANGAN,MDT_PRNE.PAYREFNUM,MDT_PRNE.IDNUM,MDT_PRNE.BUYERNAME,MDT_PRNE.APPROVAL_DESC'))
                ->where(function ($query) use ($searchTerm) {
                    $query->where('payrefnum', 'like', $searchTerm)
                        ->orWhere('idnum', 'like', $searchTerm);
                })
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->orderBy('ACCOUNT_MASTER.BRANCH_CODE', 'asc')
                    ->paginate(10)
            ]);
            
        } elseif ($state_brn == 'BRN' && $state_user != '00') {

            return view('livewire.search', [

                'MDT_PRNE' => MDT_PRNE::select(DB::raw('UF_GET_BRANCHNAME(ACCOUNT_MASTER.BRANCH_CODE) AS CAWANGAN,MDT_PRNE.PAYREFNUM,MDT_PRNE.IDNUM,MDT_PRNE.BUYERNAME,MDT_PRNE.APPROVAL_DESC'))
                    ->where(function ($query) use ($searchTerm) {
                    $query->where('payrefnum', 'like', $searchTerm)
                        ->orWhere('idnum', 'like', $searchTerm);
                })
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("TRIM(MDT_PRNE.PAYREFNUM)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.BRANCH_TYPE', '=',  $state_brn)
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->orderBy('ACCOUNT_MASTER.BRANCH_CODE', 'asc')
                    ->paginate(10)
            ]);
        }
    }
}
