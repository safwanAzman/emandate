<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MDT_OFNI;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptholdall extends Component
{
    use WithPagination;
    public $findrptholdall = '';
    public $idrptholdall;

    public function mount($id)
    {
        $this->idrptholdall = $id;
    }

    public function render()
    {

        $findrptholdall =  "%" . $this->findrptholdall . "%";
        $idrptholdall =  "%" . $this->idrptholdall . "%";

        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        if ($state_brn == 'HQ') {

            return view('livewire.rptholdall', [

                'rptdetails_holdall' => MDT_OFNI::where('blockpayment_date', 'like', $idrptholdall)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('fms_acct_no', 'like', $findrptholdall)
                    ->where('status_desc', '=', 'ON-HOLD')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {

            return view('livewire.rptholdall', [

                'rptdetails_holdall' => MDT_OFNI::where('blockpayment_date', 'like', $idrptholdall)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->where('fms_acct_no', 'like', $findrptholdall)
                    ->where('status_desc', '=', 'ON-HOLD')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'BRN' && $state_user != '00') {

            return view('livewire.rptholdall', [

                'rptdetails_holdall' => MDT_OFNI::where('blockpayment_date', 'like', $idrptholdall)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->where('fms_acct_no', 'like', $findrptholdall)
                    ->where('status_desc', '=', 'ON-HOLD')
                    ->paginate(10)

            ]);
        }
    }
}
