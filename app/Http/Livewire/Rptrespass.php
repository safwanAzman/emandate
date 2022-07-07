<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptrespass extends Component
{

    use WithPagination;
    public $findrptrespass = '';
    public $idrptrespass;

    public function mount($id)
    {
        $this->idrptrespass = $id;
    }

    public function render()
    {
        $findrptrespass =  "%" . $this->findrptrespass . "%";
        $idrptrespasss =  "%" . $this->idrptrespass . "%";

        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        if ($state_brn == 'HQ') {

            return view('livewire.rptrespass', [

                'rptdetails_respass' => MDT_SER::where('filename', 'like', $idrptrespasss)
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('filler', 'like', $findrptrespass)
                    ->where('status', '=', '00')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {
            return view('livewire.rptrespass', [

                'rptdetails_respass' => MDT_SER::where('filename', 'like', $idrptrespasss)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->where('filler', 'like', $findrptrespass)
                    ->where('status', '=', '00')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.rptrespass', [

                'rptdetails_respass' => MDT_SER::where('filename', 'like', $idrptrespasss)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    // ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->where('filler', 'like', $findrptrespass)
                    ->where('status', '=', '00')
                    ->paginate(10)

            ]);
        }
    }
}
