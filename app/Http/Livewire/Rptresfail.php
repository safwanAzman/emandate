<?php

namespace App\Http\Livewire;

use App\Models\MDT_SER;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Rptresfail extends Component
{

    use WithPagination;
    public $findrptresfail = '';
    public $idrptresfail;

    public function mount($id)
    {
        $this->idrptresfail = $id;
    }

    public function render()
    {
        $findrptresfail =  "%" . $this->findrptresfail . "%";
        $idrptresfails =  "%" . $this->idrptresfail . "%";

        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        if ($state_brn == 'HQ') {

            return view('livewire.rptresfail', [

                'rptdetails_resfail' => MDT_SER::where('filename', 'like', $idrptresfails)
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->where('filler', 'like', $findrptresfail)
                    ->where('status', '<>', '00')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'STA' && $state_user != '00') {
            return view('livewire.rptresfail', [

                'rptdetails_resfail' => MDT_SER::where('filename', 'like', $idrptresfails)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    ->where('BRANCHES.STATE_CODE', '=',  $state_user)
                    ->where('filler', 'like', $findrptresfail)
                    ->where('status', '<>', '00')
                    ->paginate(10)

            ]);
        } elseif ($state_brn == 'BRN' && $state_user != '00') {
            return view('livewire.rptresfail', [

                'rptdetails_resfail' => MDT_SER::where('filename', 'like', $idrptresfails)
                    ->join('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_SER.FILLER,1,14)"))
                    ->join('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
                    ->join('MDT_OFNI_DESC', 'MDT_SER.STATUS', '=', DB::raw("SUBSTR(MDT_OFNI_DESC.RE_CODE,2,3)"))
                    // ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
                    ->where('BRANCHES.BRANCH_CODE', '=',  $branch_user)
                    ->where('filler', 'like', $findrptresfail)
                    ->where('status', '<>', '00')
                    ->paginate(10)

            ]);
        }
    }
}
