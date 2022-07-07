<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use App\Models\MDT_TFC;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CftExportExcel implements FromQuery,WithHeadings
{
    
    protected $id;
        function __construct($id) {
        $this->idrptresfail = $id;
    }

    public function headings(): array
    {
        /*nama header */
        return [
            'SEQ_NO','FILENAME','HIND','HMODE','HDATE','HMERCHID','HSTATUS','IND','SELLERORDER','SELLERACC','BANKID','BRANCHCODE','ACCNO','BUYERNAME','IDVALIDTYPE','IC','TRANAMT','TRANCURR','CHARGETYPE','REFNO1','REFNO2','PAYREFNO','MANDATENO','NORETRY','FILLER','STATUS','INDFOOT','TOTALITEMS','TOTALAMT','ROWHASH','HASHTOTAL'            
        ];
    }

    public function query()
    {
       /*  $state_user = session('authenticatedUser')['state_code'];*/
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];

        /* if ( $state_user == 00){ */
        if ($state_brn == 'HQ'){
            return  DB::table('MDT_TFC')
            ->select('FILENAME','HIND','HMODE','HDATE','HMERCHID','HSTATUS','IND','SELLERORDER','SELLERACC','BANKID','BRANCHCODE','ACCNO','BUYERNAME','IDVALIDTYPE','IC','TRANAMT','TRANCURR','CHARGETYPE','REFNO1','REFNO2','PAYREFNO','MANDATENO','NORETRY','FILLER','STATUS','INDFOOT','TOTALITEMS','TOTALAMT','ROWHASH','HASHTOTAL')
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename'); 
        }
        elseif($state_brn == 'STA' && $state_user != '00'){
            return  DB::table('MDT_TFC')
            ->select('FILENAME','HIND','HMODE','HDATE','HMERCHID','HSTATUS','IND','SELLERORDER','SELLERACC','BANKID','BRANCHCODE','ACCNO','BUYERNAME','IDVALIDTYPE','IC','TRANAMT','TRANCURR','CHARGETYPE','REFNO1','REFNO2','PAYREFNO','MANDATENO','NORETRY','FILLER','STATUS','INDFOOT','TOTALITEMS','TOTALAMT','ROWHASH','HASHTOTAL')
            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_TFC.PAYREFNO,1,14)")  )
            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
            ->where('BRANCHES.STATE_CODE' , '=',  $state_user )
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename');

        }
        elseif($state_brn == 'BRN' && $state_user != '00'){
            //dd($branch_user);
            return  DB::table('MDT_TFC')
            ->select('FILENAME','HIND','HMODE','HDATE','HMERCHID','HSTATUS','IND','SELLERORDER','SELLERACC','BANKID','BRANCHCODE','ACCNO','BUYERNAME','IDVALIDTYPE','IC','TRANAMT','TRANCURR','CHARGETYPE','REFNO1','REFNO2','PAYREFNO','MANDATENO','NORETRY','FILLER','STATUS','INDFOOT','TOTALITEMS','TOTALAMT','ROWHASH','HASHTOTAL')
            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_TFC.PAYREFNO,1,14)")  )
            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
            ->where('BRANCHES.BRANCH_CODE' , '=',  $branch_user )
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename');
        }

    }
}
