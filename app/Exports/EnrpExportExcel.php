<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use App\Models\MDT_PRNE;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class EnrpExportExcel implements FromQuery,WithHeadings
{
    
    protected $id;
        function __construct($id) {
        $this->idrptresfail = $id;
    }

    public function headings(): array
    {
        /*nama header */
        return [
            'SEQ_NO',
            'hcrdate',
            'PAYREFNUM',
            'BANKID',
            'SELLERID',
            'PAYREFNUM',
            'BUYERNAME',
            'BUYERACCT',
            'DEBITAMT',
            'FREQMODE',
            'FREQNUM',
            'APPTYPE',
            'PURPOSE',
            'TELNO',
            'EMAIL',
            'EFFDATE',
            'EXPDATE',
            'APPDATE',
            'MERCHDATE',
            'APPROVAL',
            'RECNUM',
            'PROCESSDT',
            'LMODIFIEDDT',
            'LMODIFIEDBY',
            'PROCESSFLAG',
            'TRANDATE',
            'APPROVAL_DESC'
        ];
    }

    public function query()
    {
       /*  $state_user = session('authenticatedUser')['state_code'];*/
        $state_brn = session('authenticatedUser')['branch_type'];
        $state_user = session('authenticatedUser')['state_code'];
        $branch_user = session('authenticatedUser')['branch_code'];
        //dd($state_brn,$state_user,$branch_user);

        /* if ( $state_user == 00){ */
        if ($state_brn == 'HQ'){  

            return  DB::table('MDT_PRNE')
            ->select('hcrdate', DB::raw("SUBSTR(MDT_PRNE.PAYREFNUM,1,14)") ,'BANKID','SELLERID','PAYREFNUM','BUYERNAME','BUYERACCT','DEBITAMT','FREQMODE','FREQNUM','APPTYPE','PURPOSE','TELNO','EMAIL','EFFDATE','EXPDATE','APPDATE','MERCHDATE','APPROVAL','RECNUM','PROCESSDT','LMODIFIEDDT','LMODIFIEDBY','PROCESSFLAG','TRANDATE','APPROVAL_DESC')
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename'); 
        }
        elseif($state_brn == 'STA' && $state_user != '00'){
            //dd($branch_user);
            return  DB::table('MDT_PRNE')
            ->select('hcrdate', DB::raw("SUBSTR(MDT_PRNE.PAYREFNUM,1,14)") ,'BANKID','SELLERID','PAYREFNUM','BUYERNAME','BUYERACCT','DEBITAMT','FREQMODE','FREQNUM','APPTYPE','PURPOSE','TELNO','EMAIL','EFFDATE','EXPDATE','APPDATE','MERCHDATE','APPROVAL','RECNUM','PROCESSDT','LMODIFIEDDT','LMODIFIEDBY','PROCESSFLAG','TRANDATE','APPROVAL_DESC')
            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_PRNE.PAYREFNUM,1,14)")  )
            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
            ->where('BRANCHES.STATE_CODE' , '=', $state_user )
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename');
        }
        elseif($state_brn == 'BRN' && $state_user != '00'){
            //dd($branch_user);
            return  DB::table('MDT_PRNE')
            ->select('hcrdate', DB::raw("SUBSTR(MDT_PRNE.PAYREFNUM,1,14)") ,'BANKID','SELLERID','PAYREFNUM','BUYERNAME','BUYERACCT','DEBITAMT','FREQMODE','FREQNUM','APPTYPE','PURPOSE','TELNO','EMAIL','EFFDATE','EXPDATE','APPDATE','MERCHDATE','APPROVAL','RECNUM','PROCESSDT','LMODIFIEDDT','LMODIFIEDBY','PROCESSFLAG','TRANDATE','APPROVAL_DESC')
            ->join ('ACCOUNT_MASTER', DB::raw("ACCOUNT_MASTER.ACCOUNT_NO"), '=', DB::raw("SUBSTR(MDT_PRNE.PAYREFNUM,1,14)")  )
            ->join ('BRANCHES', 'BRANCHES.BRANCH_CODE', '=', 'ACCOUNT_MASTER.BRANCH_CODE')
            ->where('BRANCHES.BRANCH_CODE' , '=', $branch_user )
            ->where('filename','like', "%".$this->idrptresfail."%")
            ->orderby('filename');
        }

    }
}
